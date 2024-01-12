<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plans;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class PlanController extends Controller
{
    public function index(){
        $data['rows'] = Plans::get()->toArray();
        return view('admin.plans.index', $data);
    }

    public function edit($id){
        $data['row'] = Plans::where(['id'=>$id])->first();
        return view('admin.plans.edit', $data);
    }

   
}
