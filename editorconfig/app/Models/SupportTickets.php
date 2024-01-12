<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTickets extends Model
{
    use HasFactory;
    protected $fillable = ['subject',"content","client_id","status",'attachment'];
}
