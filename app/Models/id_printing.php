<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class id_printing extends Model
{
    use HasFactory;

    protected $fillable = [
            'student_id',
            'student_lastname',
            'student_middlename',
            'student_firstname', 
            'student_course', 
            'student_address', 
            'student_purpose', 
            'student_birthdate',
            'student_photo',
            'contactperson_name', 
            'contactperson_no', 
            'contactperson_address', 
        
    ];
}
