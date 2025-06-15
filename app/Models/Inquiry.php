<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    // app/Models/Inquiry.php
protected $fillable = ['name', 'company', 'phone', 'email', 'message'];

}
