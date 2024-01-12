<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountantDetails extends Model
{
    use HasFactory;
    protected $fillable = ['accountant_id',"alternate_number","company_name","gst_number",'address','adhaar_card',"pan_card",'support_email_id','support_phone','discount','type','plan_id','plan_expiry_date', 'logo', 'is_gst'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
