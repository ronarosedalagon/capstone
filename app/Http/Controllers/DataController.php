<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function search()
    {            
        $search_text = $_GET['queryID'];
        $studentsdata = DB::table('users')->where('student_id','=',$search_text)->get();

        return view('user.user_services_id', ['studentsdata'=>$studentsdata]);
    }

    public function search_idprinting()
    {            
        $search_text = $_GET['queryID'];
        $studentsdata = DB::table('users')->where('student_id','=',$search_text)->get();

        return view('user.user_services_id_printing', ['studentsdata'=>$studentsdata]);
    }
    
}



       