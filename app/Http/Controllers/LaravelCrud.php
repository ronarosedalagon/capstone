<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PrintExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\id_printing;
use App\Models\id_reissuance;
use Livewire\WithFileUploads;
use PDF;



use Hash;

class LaravelCrud extends Controller
{
    use WithFileUploads;


    public function isOnline($site = "https://youtube.com/"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }


    

    function index(){

        $data=array(
            'list' => DB::table('announcement')->where('announcement_status', '=', '0' )->get()
        );
        return view('admin-manage.information-add-announcement', $data);
    }

    function manage(){
        $data=array(
            'list' => DB::table('announcement')->where('announcement_status', '=', '0' )->get()
        );
        return view('admin-manage.information-manage-announcement', $data);
    }

    function archive(){
        $data=array(
            'list' => DB::table('announcement')->get()
        );
        return view('admin-manage.information-archive-announcement', $data);
    }

    public function archives(Request $request){
        
        $announcement = DB::table('announcement')->where('announcement_id' , $request->announcement_id)->update(['announcement_status' => $request->announcement_status]);
        // $announcement->announcement_status = $request->announcement_status;
        //$announcement->save();

    }


    // announcement crud
    function add(Request $request){

        $request->validate([
            'file' => 'required',
            'title' => 'required',
            'details' => 'required',
            'date' => 'required|after:yesterday',
            'venue' => 'required',
            'audience' => 'required',
        ]);

        $announcement_photo_name = $request->file->getClientOriginalName();
        $file_upload = $request->file->storeAs('public/assets/announcements', $announcement_photo_name);

        if($file_upload){
            $values = array(
                'announcement_title'=>$request->input('title'),
                'announcement_details'=>$request->input('details'),
                'announcement_content'=>$request->input('content'),
                'announcement_link'=>$request->input('link'),
                'announcement_eventdate'=>$request->input('date'),
                'announcement_eventvenue'=>$request->input('venue'),
                'announcement_audience'=>$request->input('audience'),
                'announcement_poster'=>$announcement_photo_name,
            );  
        }
        
        $query = DB::table('announcement')->insert($values); 

        if($query){
            return back()->with('success','Data has been successfully posted');
        }else{
            return back()->with('fail','Posting Failed');
        }
    }

    // publication crud
    function indexpubs(){
        return view('admin-manage.information-add-publication');
    }


    function add_publication(Request $request){

        $request->validate([
            'photo' => 'required',
            'file' => 'required',
            'title' => 'required',
            'date' => 'required',
        ]);

        $publication_photo_name = $request->photo->getClientOriginalName();
        $publication_file_name = $request->file->getClientOriginalName();

        $file_upload = $request->photo->storeAs('public/assets/publications', $publication_photo_name);
        $file_upload = $request->file->storeAs('public/assets/publications', $publication_file_name);

        if($file_upload){
            $values = array(
            'publication_title'=>$request->input('title'),
            'publication_date'=>$request->input('date'),
            'publication_photo'=>$publication_photo_name,
            'publication_file'=>$publication_file_name,
            );
        }

        $query = DB::table('publication')->insert($values); 

        if($query){
            return back()->with('success','Data has been successfully posted');
        }else{
            return back()->with('fail','Posting Failed');
        }
    }
    function manage_publication(){
        $data=array(
            'list' => DB::table('publication')->get()
        );
        return view('admin-manage.information-manage-publication', $data);
    }

    // organization crud
    function indexorg(){
        return view('admin-manage.information-add-organization');
    }

    function add_organization(Request $request){

        $request->validate([
            'logo' => 'required',
            'name' => 'required',
            'details' => 'required',
            'link' => 'required',
        ]);

        $organization_photo_name = $request->logo->getClientOriginalName();

        $file_upload = $request->logo->storeAs('public/assets/organizations', $organization_photo_name);

        if($file_upload){
            $values = array(
                'organization_name'=>$request->input('name'),
                'organization_details'=>$request->input('details'),
                'organization_link'=>$request->input('link'),
                'organization_logo'=>$organization_photo_name,
            );
        }

        $query = DB::table('organization')->insert($values); 

        if($query){
            return back()->with('success','Data has been successfully posted');
        }else{
            return back()->with('fail','Posting Failed');
        }
    }
    
    function manage_organization(){
        $data=array(
            'list' => DB::table('organization')->get()
        );
        return view('admin-manage.information-manage-organization', $data);
    }

    // Organization Application
    function manage_org_application(){
        $data=array(
            'list' => DB::table('org_applications')->get()
        );
        return view('admin.transaction-organization-application', $data);
    }
    // scholarship crud
    function indexscholar(){
        return view('admin-manage.information-add-scholarship');
    }

    function add_scholarship(Request $request){

        $request->validate([
            'photo' => 'required',
            'file' => 'required',
            'name' => 'required',
        ]);

        
        $scholarship_photo_name = $request->photo->getClientOriginalName();
        $scholarship_file_name = $request->file->getClientOriginalName();

        $file_upload = $request->photo->storeAs('public/assets/scholarships', $scholarship_photo_name);
        $file_upload = $request->file->storeAs('public/assets/scholarships', $scholarship_file_name);

        if($file_upload){
            $values = array(
                'scholarship_name'=>$request->input('name'),
                'scholarship_photo'=>$scholarship_photo_name,
                'scholarship_file'=>$scholarship_file_name,
            );
        }

        $query = DB::table('scholarship')->insert($values); 

        if($query){
            return back()->with('success','Data has been successfully posted');
        }else{
            return back()->with('fail','Posting Failed');
        }
    }

    function manage_scholarship(){
        $data=array(
             'list' => DB::table('scholarship')->get()
        );
        return view('admin-manage.information-manage-scholarship', $data);
    }


    // Announcement update

    public function edit_function($announcement_id){
        $announcement = DB::select('select * from announcement where announcement_id = ?', [$announcement_id]);
        return view('admin-manage.information-update-announcement',['announcement'=>$announcement]);
    }


    public function update_function(Request $request,$announcement_id){

        $announcement_title = $request->input('announcement_title');
        $announcement_details = $request->input('announcement_details');
        $announcement_content = $request->input('announcement_content');
        $announcement_link = $request->input('announcement_link');
        $announcement_eventvenue = $request->input('announcement_eventvenue');


        DB::update('update announcement set announcement_title = ?, announcement_details = ?, announcement_content = ?, announcement_link = ?, announcement_eventvenue = ? where announcement_id = ?'
        , [$announcement_title, $announcement_details, $announcement_content, $announcement_link, $announcement_eventvenue, $announcement_id]);

        return redirect('admin-announcement')->with('success','Annoucement Updated!');

    }

    // Publication update

    public function edit_function_pub($publication_id){
        $publication = DB::select('select * from publication where publication_id = ?', [$publication_id]);
        return view('admin-manage.information-update-publication',['publication'=>$publication]);
    }


    public function update_function_pub(Request $request,$publication_id){

        $publication_photo_name = $request->publication_photo->getClientOriginalName();
        $publication_file_name = $request->publication_file->getClientOriginalName();

        $file_upload = $request->publication_photo->storeAs('public/assets/publications', $publication_photo_name);
        $file_upload = $request->publication_file->storeAs('public/assets/publications', $publication_file_name);
        
        if($file_upload){
            $publication_title = $request->input('publication_title');
            $publication_date = $request->input('publication_date');
            $publication_photo = $publication_photo_name;
            $publication_file = $publication_file_name;
        }
        

        $query = DB::update('update publication set publication_title = ?, publication_photo = ?, publication_file = ?, publication_date = ? where publication_id = ?'
        , [$publication_title, $publication_photo, $publication_file, $publication_date, $publication_id]);

        if($query){
            return back()->with('success','Data has been successfully updated');
        }else{
            return back()->with('fail','Posting Failed');
        }
    }


    // Scholarship update

    public function edit_function_schl($scholarship_id){
        $scholarship = DB::select('select * from scholarship where scholarship_id = ?', [$scholarship_id]);
        return view('admin-manage.information-update-scholarship',['scholarship'=>$scholarship]);
    }


    public function update_function_schl(Request $request,$scholarship_id){

        $publication_photo_name = $request->scholarship_photo->getClientOriginalName();
        $publication_file_name = $request->scholarship_file->getClientOriginalName();

        $file_upload = $request->scholarship_photo->storeAs('public/assets/scholarships', $publication_photo_name);
        $file_upload = $request->scholarship_file->storeAs('public/assets/scholarships', $publication_file_name);

        if($file_upload){
            $scholarship_name = $request->input('scholarship_name');
            $scholarship_photo = $publication_photo_name;
            $scholarship_file = $publication_file_name;
        }
        

        DB::update('update scholarship set scholarship_name = ?, scholarship_photo = ?, scholarship_file = ? where scholarship_id = ?'
        , [$scholarship_name, $scholarship_photo, $scholarship_file, $scholarship_id]);

        return redirect('admin-scholarship')->with('success','Scholarship Updated!');

    }

    // Organization update

    public function edit_function_org($organization_id){
        $organization = DB::select('select * from organization where organization_id = ?', [$organization_id]);
        return view('admin-manage.information-update-organization',['organization'=>$organization]);
    }


    public function update_function_org(Request $request,$organization_id){

        $organization_photo_name = $request->organization_logo->getClientOriginalName();
        $file_upload = $request->organization_logo->storeAs('public/assets/organizations', $organization_photo_name);

        if($file_upload){
            $organization_name = $request->input('organization_name');
            $organization_details = $request->input('organization_details');
            $organization_link = $request->input('organization_link');
            $organization_logo = $organization_photo_name;
        }
       

        $query = DB::update('update organization set organization_name = ?, organization_details = ?, organization_logo = ?, organization_link = ? where organization_id = ?'
        , [$organization_name, $organization_details, $organization_logo, $organization_link, $organization_id]);

        if($query){
            return back()->with('success','Data has been successfully updated');
        }else{
            return back()->with('fail','Posting Failed');
        }
    }

    // update organization application status
    public function edit_function_org_status($org_applicationID){
        $org_app = DB::select('select * from org_applications where org_applicationID = ?', [$org_applicationID]);
        return view('admin-manage.transaction-update-organization-application',['org_applications'=>$org_app]);
    }

    public function update_function_org_status(Request $request,$org_applicationID){

        $president_lastname = $request->input('president_lastname');
        $president_firstname = $request->input('president_firstname');
        $president_course = $request->input('president_course');
        $president_year = $request->input('president_year');
        $president_contactno = $request->input('president_contactno');
        $president_email = $request->input('president_email');
        $org_name = $request->input('org_name');
        $org_motto = $request->input('org_motto');
        $org_mission = $request->input('org_mission');
        $org_vision = $request->input('org_vision');
        $org_background = $request->input('org_background');
        $org_application_letter = $request->input('org_application_letter');
        $org_officer_list = $request->input('org_officer_list');
        $org_constituon_bylaws = $request->input('org_constituon_bylaws');
        $org_plan = $request->input('org_plan');
        $org_fundreport = $request->input('org_fundreport');
        $application_status = "approved";

        DB::update('update org_applications set application_status = ? where org_applicationID = ?'
        , [$application_status, $org_applicationID]);

        return redirect('admin-organization-application')->with('success','Application Status Updated!');

    }
    public function update_function_org_status_inc (Request $request, $org_applicationID){
        $application_status = "incomplete";

        DB::update('update org_applications set application_status = ? where org_applicationID = ?'
        , [$application_status, $org_applicationID]);

        return redirect('admin-organization-application')->with('success','Application Status Updated!');
    }

    // user - send validation requests
    public function send_requests($student_id){
        $stud_data = DB::select('select * from users where student_id = ?', [$student_id]);
        return view('user.user_services_id_send_validationrequest',['users'=>$stud_data]);
    }

    public function process_requests(Request $request){

        $request->validate([
            'stud_yearlevel' => 'required',
            'stud_receipt' => 'required',
        ]);

        $request_data=[
            'id' => $request->stud_id,
            'lastname' => $request->stud_lastname,
            'middlename' => $request->stud_middlename,
            'firstname' => $request->stud_firstname,
            'course' => $request->stud_course,
            'prev_yearlevel' => $request->stud_prev_yearlevel,
            'receipt' => $request->stud_receipt,
            'yearlevel' => $request->stud_yearlevel,
            $validation_status = "on process",
        ];
        

        $query = DB::table('id_validations')->insert([
            'student_id'=>($request_data['id']),
            'student_lastname'=>($request_data['lastname']),
            'student_middlename'=>($request_data['middlename']),
            'student_firstname'=>($request_data['firstname']),
            'course'=>($request_data['course']),
            'prev_yearlevel'=>($request_data['prev_yearlevel']),
            'current_yearlevel'=>($request_data['yearlevel']),
            'enrolment_receipt'=>($request_data['receipt']),
            'status'=> ($validation_status),
        ]); 

        DB::update('update users set status = ? where student_id = ?'
        , [$validation_status, $request_data['id']]);


        if($query){
            return back()->with('success','Data has been successfully updated');
        }else{
            return back()->with('fail','Posting Failed');
        }

        return redirect()->back()->with('success','Request for Verification has been Sent!');
    }

    // admin - ID Services - Validation 
    public function approved_requests($student_id, $current_yearlevel){
        $request_data=[
            'id' => $student_id,
            $validation_status = "validated",
            'updated_year' => $current_yearlevel,
            $to_update = "",
        ];
        
        DB::update('update users set status = ?, year_level = ? where student_id = ?'
        , [$validation_status,$request_data['updated_year'], $request_data['id']]);

        DB::update('update id_validations set status = ?, prev_yearlevel = ?, current_yearlevel = ? where student_id = ?'
        , [$validation_status,$request_data['updated_year'], $to_update, $request_data['id']]);

    
        return redirect()->back()->with('success','Request for Verification has been Sent!');
    }


    // admin - ID Services - Reissuance 
    public function reissuance_confirm_request(Request $request){
    $request->validate([
        'inputID'=>'required',
        'inputPassword'=>'required'
    ]);
    

        $user = User::where('student_id','=',$request->inputID)->first();
            
            if($user){
                if(Hash::check($request->inputPassword,$user->password)){
                    if($user->card =='pending'){
                        return back()->with('fail',"You have already requested an ID Card or Your Reissuance Application is not yet approved");
                    }
                    else{
                        return redirect('/user-services/IDcard-Reissuance-Form');
                    }
                }else{
                    return back()->with('fail',"Password don't match");
                }
        }else{
            return back()->with('fail','This Student ID is not registered.');
        }
        
    }


    // user - ID Services - Printing
    public function confirm_request(Request $request){
        $request->validate([
            'inputID'=>'required',
            'inputPassword'=>'required'
        ]);
        
    
            $user = User::where('student_id','=',$request->inputID)->first();
                
                if($user){
                    if(Hash::check($request->inputPassword,$user->password)){
                        if($user->card =='pending' || $user->card =='printed'){
                            return back()->with('fail',"You have already requested an ID Card. Lost your ID? proceed to Re-issuance tab");
                        }
                        else{
                            return redirect('/user-services/IDcard-Printing-Form');
                        }
                    }else{
                        return back()->with('fail',"Password don't match");
                    }
            }else{
                return back()->with('fail','This Student ID is not registered.');
            }
            
        }


    // admin - ID Services - Printing - Export Lists
    public function export_user(){
        return Excel::download(new PrintExport, 'IDprinting.xlsx');
    }

    // admin - ID Services - Printing - Export Lists
    public function print_status($student_id, $status){
        $request_data=[
            'id' => $student_id,
            $new_status = "printed",
        ];
        
        DB::update('update id_printings set status = ? where student_id = ?'
        , [$new_status, $request_data['id']]);

        DB::update('update users set card = ? where student_id = ?'
        , [$new_status, $request_data['id']]);

    
        return redirect()->back()->with('success','ID Printing status has been updated successfully');
    }

    // admin - ID Services - Reissuance - Export Lists
    public function reissuance_status($student_id, $status, Request $request ){

        if($this->isOnline()){
            $mail_data=[
                'fromName' => 'cecstudentaffairsoffice@gmail.com',
                'subject' => 'A message from Student Affairs Office',
                'recipient'=> $request->to,
                'name' => $request->to_name,
                'date' => $request->to_date,
            ];

            \Mail::send('email-approved_reissuance',$mail_data, function($message) use($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });

            $request_data=[
                'id' => $student_id,
                $new_status_reissuance_table = "approved",
                $new_status_users_table = "",
            ];
            
            DB::update('update id_reissuances set status = ? where student_id = ?'
            , [$new_status_reissuance_table, $request_data['id']]);
    
            DB::update('update users set card = ? where student_id = ?'
            , [$new_status_users_table, $request_data['id']]);
    
            return redirect()->back()->with('success','Request status has been updated successfully and Email Approval has been sent');

        }else{
            return redirect()->back()->withInput()->width('error','Check your internet connection');
        }
        
        
    }

    // user - Services - SAO Certifcate
    public function saocert_confirm_request (Request $request){
        $request->validate([
            'inputID'=>'required',
            'inputPassword'=>'required'
        ]);
        
    
            $user = User::where('student_id','=',$request->inputID)->first();
                
                if($user){
                    if(Hash::check($request->inputPassword,$user->password)){

                            return redirect('/user-services/SAOCertificate-requestform');
                    }else{
                        return back()->with('fail',"Password don't match");
                    }
            }else{
                return back()->with('fail','This Student ID is not registered.');
            }
            
    }

    // user - Services - Send SAO certificate request

    function send_saocert_request(Request $request){

        $request->validate([
            'photo' => 'required',
        ]);

        $saocert_receipt_name = $request->photo->getClientOriginalName();

        $file_upload = $request->photo->storeAs('public/assets/sao_cert_receipt', $saocert_receipt_name);

        if($file_upload){
            $values = array(
            'student_id'=>$request->input('student_id'),
            'student_name'=>$request->input('student_name'),
            'student_email'=>$request->input('student_email'),
            'payment_receipt'=>$saocert_receipt_name,
            );
        }

        $query = DB::table('sao_certificate')->insert($values); 

        if($query){
            return back()->with('success','Data has been successfully posted');
        }else{
            return back()->with('fail','Posting Failed');
        }
    }

    // admin - services - confirm sao certificate request
    public function confirm_sao_cert_request($student_id, $status, Request $request ){

        if($this->isOnline()){
            $mail_data=[
                'fromName' => 'cecstudentaffairsoffice@gmail.com',
                'subject' => 'A message from Student Affairs Office',
                'recipient'=> $request->to,
                'name' => $request->to_name,
                'date' => $request->to_date,
            ];

            \Mail::send('email-approved-saocertificate',$mail_data, function($message) use($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });

            $request_data=[
                'id' => $student_id,
                $new_status_saocert_table = "approved",
            ];
            
            DB::update('update sao_certificate set status = ? where student_id = ?'
            , [$new_status_saocert_table, $request_data['id']]);
    
            return redirect()->back()->with('success','Request status has been confirmed successfully and Email Approval has been sent');

        }else{
            return redirect()->back()->withInput()->width('error','Check your internet connection');
        }
        
        
    }

    // admin - sao certificate - generate pdf
    public function export_certificate($student_name){
        $std_name = $student_name;
        $data = ['name' => $std_name,
            ];
        $pdf = PDF::loadView('pdf.template-sao-cert', $data)->setPaper('a4', 'portrait');;
        return $pdf->download('saocert_'.$std_name.'.pdf');
    }


    

    


    
}

    
