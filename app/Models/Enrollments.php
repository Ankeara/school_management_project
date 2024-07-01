<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollments extends Model
{
        protected $table = "enrollments";
    protected $primarykey = "id";
protected $fillable = [
    'enroll_no', 'batches_id', 'student_id', 'join_date', 'fee',
    // Add other fillable attributes if needed
];
    use HasFactory;
}
