<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class id_reissuance extends Model
{
    use HasFactory;

    protected $primaryKey ='id';

    protected $fillable = [
        'student_id',
        'student_lastname',
        'student_firstname', 
        'docu_affidavit',
        'docu_paymentreceipt'
    
    ];
}
