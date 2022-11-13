<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function send(Request $request){

        if($this->isOnline()){
            $mail_data=[
                'fromName' => 'cecstudentaffairsoffice@gmail.com',
                'subject' => 'A message from Student Affairs Office',
                'recipient'=> $request->to,
                'name' => $request->to_lastname,
                'date' => $request->to_date,
                'body' => $request->message,
                'id' => $request->applicationID
            ];

            \Mail::send('email-template',$mail_data, function($message) use($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });

            $application_status = "incomplete";
                DB::update('update org_applications set application_status = ? where org_applicationID = ?'
                , [$application_status, $mail_data['id']]);

            return redirect()->back()->with('success','Email Sent!');

        }else{
            return redirect()->back()->withInput()->width('error','Check your internet connection');
        }

    }
    public function sendApproved(Request $request){

        if($this->isOnline()){
            $mail_data=[
                'fromName' => 'cecstudentaffairsoffice@gmail.com',
                'subject' => 'A message from Student Affairs Office',
                'recipient'=> $request->to,
                'name' => $request->to_lastname,
                'body' => $request->message,
                'organization' => $request->to_orgname,
                'id' => $request->applicationID
            ];

            \Mail::send('email-approved-template',$mail_data, function($message) use($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });

            $application_status = "approved";
                DB::update('update org_applications set application_status = ? where org_applicationID = ?'
                , [$application_status, $mail_data['id']]);

            return redirect()->back()->with('success','Email Sent!');

        }else{
            return redirect()->back()->withInput()->width('error','Check your internet connection');
        }

    }

    public function isOnline($site = "https://youtube.com/"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }

    
}
