<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Models\Notifications;

class NotificationController extends CommonController
{
    function __construct()
    {
        $this->middleware('permission:notifications-list|notifications-create|notifications-delete', ['only' => ['index']]);
        $this->middleware('permission:notifications-create', ['only' => ['create']]);
        $this->middleware('permission:notifications-delete', ['only' => ['bulkDelete']]);
    }
    public function index(Request $request)
    {
        $request = $request->all();

        $row = Notifications::select('id', 'image', 'title', "description", 'created_at', 'status');
        if (isset($request['status']))  $row->where(['status' => $request['status']]);

        if (isset($request['search'])) {
            $row->where(function ($query) use ($request) {
                $query->orWhere('description', 'LIKE', "%{$request['search']}%");
                $query->orWhere('title', 'LIKE', "%{$request['search']}%");
            });
        }
        $data['rows'] = $row->paginate(10);
        return view('admin.notifications.index', $data);
    }
    public function create(Request $request)
    {
        $data = $request->all();
        try {

            $dataArr['title'] = $data['title'];
            $dataArr['description'] = $data['description'];
            if ($request->hasFile('image')) {
                $request->validate([
                    'file' => 'mimes:png,jpeg,jpg,svg|max:2048',
                ]);
                $dataArr['image'] = uniqid() . '.' . $request->image->extension();
                $request->image->move(public_path('upload/notifications'), $dataArr['image']);
            }

            $message = __("Data added successfully");
            Notifications::create($dataArr);

            return redirect()->route('notifications')->with('success', $message);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function bulkDelete(Request $request)
    {
        $result = ["code" => 400];
        try {
            $ids = $request->input('id');
            if (is_array($ids)) {
                $getCategory = Notifications::select('image')->whereIn('id', $ids)->get();
                foreach ($getCategory as $gc) {
                    if (isset($gc['image'])) {
                        removeImage($gc['image'], 'notifications');
                    }
                }
                Notifications::whereIn('id', $ids)->delete();
            } else {
                $getCategory = Notifications::select('image')->where(['id' => $ids])->first();
                if (isset($getCategory['image'])) {
                    removeImage($getCategory['image'], 'notifications');
                }
                Notifications::where('id', '=', $ids)->delete();
            }
            $result["code"] = 200;
            $result["message"] = __("Data deleted successfully.");
        } catch (\Throwable $th) {
            $result["message"] = $th->getMessage();
        }
        return response()->json($result, $result["code"]);
    }
}
