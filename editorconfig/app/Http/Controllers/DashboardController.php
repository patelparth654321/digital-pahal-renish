<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{


    public function index()
    {
        return view("index");
    }

    public function inquiry()
    {
        return view("inquiry");
    }

    public function submitInquiry(Request $request)
    {
        try {
            DB::beginTransaction();
            $rules = [
                'email' => ('required|email'),
                'phone' => 'required',
                'name' => 'required',
                'address' => 'required',
                'company_name' => 'required',
                'category' => 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return redirect()->back()->with('error', $error)->withInput();
            }
            $details = $request->only('name', 'email', 'phone', 'address', 'company_name', 'is_gst', 'category', 'gst_number');
            Inquiry::create($details);
            DB::commit();
            return redirect()->route('thankyou');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function thankyou()
    {
        return view("thank-you");
    }
    public function submitContact(Request $request)
    {
        try {
            DB::beginTransaction();
            $rules = [
                'email' => ('required|email'),
                'phone' => 'required',
                'name' => 'required',
                'message' => 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return redirect()->back()->with('error', $error)->withInput();
            }
            $details = $request->only('name', 'email', 'phone', 'message');
            ContactUs::create($details);
            DB::commit();
            return redirect()->route('thankyou');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function privacyPolicy(){
        
        return view("privacy");
    }
    public function termsConditions()
    {
        return view("terms_conditions");
    }
}
