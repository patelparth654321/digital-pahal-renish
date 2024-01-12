<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    protected $fillable = ['name',"email","phone","company_name", 'address', 'gst_number','category','is_gst','status'];
}
