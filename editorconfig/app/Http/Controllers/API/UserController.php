<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Banks;
use App\Models\ClientDetails;
use App\Models\Documents;
use App\Models\DocumentTypes;
use App\Models\Notifications;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    public function uploadDocument(Request $request)
    {
        try {
            DB::beginTransaction();
            $details = $request->only('document_type', 'year', 'month', 'bank', 'category', 'client_id', 'sub_type');
            $details['parent_id'] = Auth::user()->id;
            if ($request->hasFile('file')) {
                $files = $request->file('file');
                foreach ($files as $file) {
                    

                    $details['document'] = uniqid() . '.' . $file->extension();
                    $details['document_name'] = $file->getClientOriginalName();
                    if ($file->move(public_path('upload/documents'), $details['document'])) {
                        $data =  Documents::create($details);
                        $company_name = Auth::user()->name;
                        $getDoc = Documents::select('dt.title', 'documents.client_id')->where('documents.id', '=', $data->id)->join('document_types as dt', 'dt.key', '=', 'documents.document_type')->first();
                        $notification['title'] = $company_name . " uploaded new document";
                        $notification['description'] = "Your Client $company_name has been recently uploaded new document: $getDoc->title.";
                        $notification['to_id'] = Auth::user()->added_by;
                        Notifications::create($notification);
                        DB::commit();
                    }
                }
                return $this->sendResponse([], 'Files uploaded successfully.');
            } else {
                return $this->sendError("File is required.", null, 500);
            }
        } catch (\Exception $exception) {
            DB::rollback();
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }
    public function documentTypes(Request $request)
    {
        try {
            if ($request->parent_id) {
                $data['rows'] = DocumentTypes::where(['type' => 1])->where("parent_id", "!=", "0")->get()->toArray();
            } else {
                $data['rows'] = DocumentTypes::where(['type' => 1, 'parent_id' => 0])->get()->toArray();
            }

            return $this->sendResponse($data, 'Data fetched successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }
    public function myDocuments($parent_id, $client_id)
    {
        try {
            $getClient = User::where(['id' => $client_id, 'added_by' => Auth::user()->id])->first();
            if (!$getClient && $client_id != Auth::user()->id) {
                return $this->sendError("Invalid Client ID", null, 500);
            }
            $data['docs'] = DocumentTypes::where(['type' => 1, 'parent_id' => $parent_id])->get()->toArray();
            $data['docs'] = array_map(function ($s) use ($client_id) {

                $s['uploaded_docs'] = Documents::where(['document_type' => $s['key'], 'client_id' => $client_id])->get()->toArray();
                $s['uploaded_docs'] = array_map(function ($u) {
                    $u['document'] = getImagePath($u['document'], 'documents');
                    return $u;
                }, $s['uploaded_docs']);
                return $s;
            }, $data['docs']);

            return $this->sendResponse($data, 'Data fetched successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }

    public function uploadedDocumentsFilter(Request $request, $client_id, $key)
    {
        try {

            $getClient = User::where(['id' => $client_id, 'added_by' => Auth::user()->id])->first();
            if (!$getClient && $client_id != Auth::user()->id) {
                return $this->sendError("Invalid Client ID", null, 500);
            }

            $getData = Documents::where(['document_type' => $key, 'client_id' => $client_id]);
            if (isset($request->month) && $request->month != '') {
                $getData->where(['month' => $request->month]);
            }
            $data = $getData->get()->toArray();
            $data = array_map(function ($u) {
                $u['document'] = getImagePath($u['document'], 'documents');
                return $u;
            }, $data);


            return $this->sendResponse($data, 'Data fetched successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }

    public function getMonthWiseCount(Request $request, $client_id, $key)
    {
        try {
           
            $getClient = User::where(['id' => $client_id, 'added_by' => Auth::user()->id])->first();
            if (!$getClient && $client_id != Auth::user()->id) {
                return $this->sendError("Invalid Client ID", null, 500);
            }
            $data = [
                [
                    'key'=>"01",
                    'value'=>"January"
                ],
                [
                    'key'=>"02",
                    'value'=>"February"
                ],
                [
                    'key'=>"03",
                    'value'=>"March"
                ],
                [
                    'key'=>"04",
                    'value'=>"April"
                ],
                [
                    'key'=>"05",
                    'value'=>"May"
                ],
                [
                    'key'=>"06",
                    'value'=>"June"
                ],
                [
                    'key'=>"07",
                    'value'=>"July"
                ],
                [
                    'key'=>"08",
                    'value'=>"August"
                ],
                [
                    'key'=>"09",
                    'value'=>"Suptember"
                ],
                [
                    'key'=>"10",
                    'value'=>"October"
                ],
                [
                    'key'=>"11",
                    'value'=>"November"
                ],
                [
                    'key'=>"12",
                    'value'=>"December"
                ]
            ];
            $data = array_map(function ($u) use($key, $client_id) {
                 $u['count'] = Documents::where(['document_type' => $key, 'client_id' => $client_id])->where(['month' => $u['key']])->get()->count();
                 return $u;
            }, $data);
            return $this->sendResponse($data, 'Data fetched successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }
    public function profile()
    {
        try {
            $user = Auth::user();
            $user['details'] = ClientDetails::where(['client_id' => $user->id])->first();
            $user['image'] = getImagePath($user['image'], 'profile');
            return $this->sendResponse($user, 'Logged in successfully');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            $user = Auth::user();
            $rules = [
                'old_password' => ['required'],
                'new_password' => ['required', 'min:8']
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return $this->sendError($error, json_decode("{}"));
            }

            if (!(Hash::check($request->old_password, $user->password))) {
                return $this->sendError('Invalid old password.');
            }
            $data['password'] = Hash::make($request->new_password);

            $data['updated_at'] =  date('Y-m-d H:i:s');
            User::where('id', $user->id)->update($data);
            return $this->sendResponse([], 'Password updated successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }
    public function deleteDocument($id)
    {
        try {
            $getDocument = Documents::where(['id' => $id])->first();
            if ($getDocument) {
                removeImage($getDocument->document, 'documents');
                Documents::where('id', '=', $id)->delete();
                return $this->sendResponse([], 'Document deleted successfully');
            } else {
                return $this->sendError("Invalid document", null, 500);
            }
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }
    public function banks()
    {
        try {
            $data['rows'] = Banks::select('id', 'name')->where(['status' => 1])->get()->toArray();
            return $this->sendResponse($data, 'Data fetched successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }

    public function notifications()
    {
        try {
            $data['unread'] = Notifications::where(['to_id' => Auth::user()->id, 'read_status' => 0])->orderBy('id', 'desc')->get()->toArray();
            $data['read'] = Notifications::where(['to_id' => Auth::user()->id, 'read_status' => 1])->orderBy('id', 'desc')->get()->toArray();
            return $this->sendResponse($data, 'Data fetched successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }

    public function markAsRead()
    {
        try {
            Notifications::where(['to_id' => Auth::user()->id, 'read_status' => 0])->update(['read_status' => 1]);
            return $this->sendResponse([], 'Data updated successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }

    function addUpdateMember(Request $request)
    {
        try {
            DB::beginTransaction();
            $rules = [
                'email' => $request->user_id ? ('required|email|unique:users,email,' . $request->user_id) : ('required|email|unique:users,email'),
                'phone' => $request->user_id ? ('required|unique:users,phone,' . $request->user_id) : ('required|unique:users,phone'),
                'address' => 'required'

            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return $this->sendError($error, null, 500);
            }
            $details = $request->only('name', 'email', 'phone');
            

            if (isset($request->user_id)) {

                $message = __("Data updated successfully");
                $details['updated_at'] = date('Y-m-d H:i:s');
                User::where('id', $request->user_id)->update($details);
                $user_id = $request->user_id;
            } else {
                $details['user_type'] = 3;
                $details['added_by'] = Auth::user()->id;
                $message = __("Data added successfully");
                $user_data = User::create($details);
                $user_id = $user_data->id;
            }
            $additionalInfo = $request->only('company_name', 'gst_number', 'address', 'pancard_number', 'gst_type', 'type');
            $additionalInfo['client_id'] = $user_id;

            $findData = ClientDetails::where(['client_id' => $user_id])->first();
            if ($findData) {
                $additionalInfo['updated_at'] = date('Y-m-d H:i:s');
                $user_data =  ClientDetails::where('id', $findData->id)->update($additionalInfo);
            } else {
                ClientDetails::create($additionalInfo);
            }
            DB::commit();
            return $this->sendResponse([], $message);
        } catch (\Exception $exception) {
            DB::rollback();
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }

    public function memberList(Request $request)
    {

        try {
            $request = $request->all();
            $where['user_type'] = 3;
            $row =  User::select('a.*', 'users.*', DB::raw('(SELECT COUNT(*) FROM documents as d WHERE d.client_id = users.id) as total_documents'), DB::raw('(SELECT COUNT(*) FROM documents as d WHERE d.client_id = users.id AND d.view_status=0) as unread_documents'))->join('client_details as a', 'a.client_id', '=', 'users.id')->where(function ($query) {
                $query->orWhere(['added_by' => Auth::user()->id]);
                $query->orWhere(['users.id' => Auth::user()->id]);
            })->orderBy('users.id', 'desc');
            if (isset($request['status']))  $where['status'] = $request['status'];
            if (isset($request['type'])) $row->where('type', 'LIKE', "%{$request['type']}%");
            $row->where($where);
            if (isset($request['search'])) {
                $row->where(function ($query) use ($request) {
                    $query->orWhere('name', 'LIKE', "%{$request['search']}%");
                    $query->orWhere('phone', 'LIKE', "%{$request['search']}%");
                    $query->orWhere('email', 'LIKE', "%{$request['search']}%");
                    $query->orWhere('company_name', 'LIKE', "%{$request['search']}%");
                });
            }
            $user = $row->get();
            return $this->sendResponse($user, 'Data fetched successfully');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }
    public function deleteMember($id)
    {
        try {

            User::where('id', '=', $id)->delete();
            ClientDetails::where(['client_id' => $id])->delete();
            Documents::where('client_id', '=', $id)->delete();
            return $this->sendResponse([], "Member deleted successfully.");
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }
    public function changeMemberStatus(Request $request)
    {
        try {

            $ids = $request->input('id');
            $status = $request->input('status');
            User::where('id', '=', $ids)->update(['status' => $status]);
            return $this->sendResponse([], "Status updated successfully.");
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }
}
