<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        return view('/admin-organization-application');
    }
    public function store(Request $request)
    {
        $email = $request->to;
        $message = $request->message;
        dd($email. ' '.$message);

        // Mail::to($email)->send(new OrgApplicationIncomplete());
        // return 'Sent';

    }

    
}