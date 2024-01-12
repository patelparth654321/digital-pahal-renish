<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
class PolicyController extends Controller
{
    public function index(){
        return view('admin.policies');
    }


    public function updatePolicy(Request $request) {
        try{  
            $data = $request->all();
            foreach($data as $key=>$val){
                Settings::where('key', $key)->update(['value' => $val, 'updated_at'=>date('Y-m-d H:i:s')]);
            }
            $message = __("Policies updated successfully");
            return redirect()->back()->with('success', $message);
        }catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
