<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentTypes extends Model
{
    use HasFactory;
    protected $fillable = ['title',"key","type","icon",'sample_file','parent_id','status'];
}
