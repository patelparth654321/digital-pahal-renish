<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Models\Pages;

class PageController extends CommonController
{
    function __construct()
    {
    }
    public function index()
    {
        $data['rows'] = Pages::select('id', 'title', 'created_at', 'status')->paginate(10);
        return view('admin.pages.index', $data);
    }
    public function create(Request $request)
    {
        $data = $request->all();
        try {

            $dataArr['title'] = $data['title'];
            $dataArr['description'] = $data['description'];
            $dataArr['status'] = isset($data['status']) ? 1 : 0;

            if (isset($data['page_id']) && !empty($data['page_id'])) {
                $message = __("Data updated successfully");
                $data['update_at'] = date('Y-m-d H:i:s');
                Pages::where('id', $data['page_id'])->update($dataArr);
            } else {
                $message = __("Data added successfully");
                Pages::create($dataArr);
            }
            return redirect()->route('pages')->with('success', $message);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function bulkDelete(Request $request)
    {
        $result = ["code" => 400];
        try {
            $ids = $request->input('id');
            Pages::where('id', '=', $ids)->delete();
            $result["code"] = 200;
            $result["message"] = __("Data deleted successfully.");
        } catch (\Throwable $th) {
            $result["message"] = $th->getMessage();
        }
        return response()->json($result, $result["code"]);
    }

    public function view($id)
    {
        $data = Pages::where('id', $id)->first();
        return $data;
    }
}
