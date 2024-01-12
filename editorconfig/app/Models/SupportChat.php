<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportChat extends Model
{
    use HasFactory;
    protected $fillable = ['ticket_id',"message","from_id","to_id"];
}
