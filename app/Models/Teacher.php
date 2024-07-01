<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teacher";
    protected $primarykey = "id";
    protected $fillable = ['name', 'address', 'mobile'];
    use HasFactory;
}