<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\CommonController;
use App\Models\Faqs;
use App\Models\SupportTickets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupportController extends CommonController
{
    public function index()
    {
        $data['support_tickets'] = SupportTickets::where(['client_id' => Auth::user()->id])->orderBy('id', 'desc')->get();
        $data['faqs'] = Faqs::where(['status' => 1, 'for' => 1])->get();
        return view('client.help', $data);
    }

    public function addSupportTicket(Request $request)
    {
        try {
            DB::beginTransaction();
            $details = $request->only('subject', 'content');
            $details['client_id'] = Auth::user()->id;
            if ($request->hasFile('attachment')) {
                $details['attachment'] = uniqid() . '.' . $request->attachment->extension();
                $request->attachment->move(public_path('upload/support_tickets'), $details['attachment']);
            }
            $message = __("Data added successfully");
            SupportTickets::create($details);
            DB::commit();
            return redirect()->back()->with('success', $message);
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
