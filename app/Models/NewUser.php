<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// user model
class NewUser extends Model
{
    use HasFactory;
    protected $fillable = ['user_name', 'user_id', 'start_date','verified'];
}
