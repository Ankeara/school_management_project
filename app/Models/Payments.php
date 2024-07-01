<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = "payments";
    protected $primarykey = "id";
    protected $fillable = ['enrollment_id', 'paid_date', 'amount'];
    use HasFactory;

}