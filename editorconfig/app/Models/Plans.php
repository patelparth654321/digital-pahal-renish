<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    use HasFactory;
    protected $fillable = ['name',"icon","descriptions","price",'categories','client_limit','features','status', 'duration'];
}
