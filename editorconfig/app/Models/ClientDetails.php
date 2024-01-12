<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDetails extends Model
{
    use HasFactory;
    protected $fillable = ['client_id',"company_name","address","gst_number",'pancard_number','type',"gst_type"];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
