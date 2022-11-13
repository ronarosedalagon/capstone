<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class org_application extends Model
{
    use HasFactory; 

    protected $primaryKey ='id';
    public $timestamps = false;

    protected $fillable =[
        'first_name',
        'president_lastname',
        'president_firstname',
        'president_course',
        'president_year',
        'president_contactno',
        'president_email',
        'org_name',
        'org_motto',
        'org_mission',
        'org_vision',
        'org_background',
        'org_application_letter',
        'org_officer_list',
        'org_constituon_bylaws',
        'org_plan',
        'org_fundreport'
    ];
}
