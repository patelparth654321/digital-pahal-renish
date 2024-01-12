<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Models\Inquiry;
use Illuminate\Http\Request;
class InquiryController extends CommonController
{
    function __construct()
    {
    }
    public function index(Request $request)
    {
        $request = $request->all();
        $where = [];
        $row = Inquiry::select('*');
        if (isset($request['status']))  $where['status'] = $request['status'];
        if (isset($request['type']))  $where['category.type'] = $request['type'];
        $row->where($where);
        if (isset($request['search'])) {
            $row->where(function ($query) use ($request) {
                $query->orWhere('name', 'LIKE', "%{$request['search']}%");
                $query->orWhere('phone', 'LIKE', "%{$request['search']}%");
                $query->orWhere('email', 'LIKE', "%{$request['search']}%");
                $query->orWhere('company_name', 'LIKE', "%{$request['search']}%");
            });
        }
        $data['rows'] = $row->orderBy('id', 'desc')->paginate(10);
        return view('admin.inquiry', $data);
    }

    public function statusChange(Request $request)
    {
        $result = ["code" => 400];
        try {
            $ids = $request->input('id');
            $status = $request->input('status');
            Inquiry::where('id', '=', $ids)->update(['status' => $status]);
            $result["code"] = 200;
            $result["message"] =   __("Data updated successfully.");
        } catch (\Throwable $th) {
            $result["message"] = $th->getMessage();
        }
        return response()->json($result, $result["code"]);
    }

}
