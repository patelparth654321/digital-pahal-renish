<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;
    protected $fillable = ['document',"document_name","client_id","status",'view_status','document_type', 'year', 'month','bank','category', 'password', 'sub_type','parent_id'];
}
