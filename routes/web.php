<?php



use Auth\VerificationController;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LaravelCrud;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DataController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'disable_back_btn'],function(){

     // this is the login urls
    
    // login
    Route::get('/login', [CustomAuthController::class,'login'])->middleware(['alreadyLoggedIn','disable_back_btn'])->name('user_login');
    
    //  login/validate
    Route::post('login-user',[CustomAuthController::class,'loginUser'])->name('login-user')->middleware('disable_back_btn');

    // create
    Route::get('/registration', [CustomAuthController::class,'registration'])->middleware('alreadyLoggedIn');
    Route::get('GetSubCatAgainstMainCatEdit/{id}', [CustomAuthController::class,'GetSubCatAgainstMainCatEdit'] );

    // user/store
    Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');

    // verify email
    Route::get('/register-user/verify/{token}',[CustomAuthController::class,'verifyEmail'])->name('register-verify');

    Route::get('/admin',[CustomAuthController::class,'admin_dashboard'])->middleware(['isLoggedIn','disable_back_btn','isUser']);
    Route::get('/user',[CustomAuthController::class,'user_dashboard'])->middleware(['isLoggedIn','disable_back_btn','isAdmin']);
    Route::get('/logout', [CustomAuthController::class,'logout']);


    // admin dashboard views

    // admin dashboard - information pannel
    Route::get('/admin-announcement', function () {
        $announce = DB::table('announcement')
        ->select('announcement_title', 'announcement_eventdate','announcement_eventvenue', 'announcement_poster','announcement_details','announcement_content','announcement_link','createdat')
        ->orderBy('createdat', 'desc')
        ->where('announcement_status', '=', '0')
        ->get();
        
        return view('admin.information-announcement', compact('announce'));
    })->middleware('isUser');

    Route::get('/admin-publication', function () {
        $pubs = DB::table('publication')
        ->select('publication_title', 'publication_photo','publication_file','publication_date')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.information-publication', compact('pubs'));
    })->middleware('isUser');

    Route::get('/admin-scholarship', function () {
        $scholar = DB::table('scholarship')
        ->select('scholarship_name', 'scholarship_photo','scholarship_file')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.information-scholarship', compact('scholar'));
    })->middleware('isUser');

    Route::get('/admin-organization', function () {
        $org = DB::table('organization')
        ->select('organization_name', 'organization_logo','organization_link','organization_details')
        ->orderBy('created_at', 'desc')
        ->get();
        
        return view('admin.information-organization', compact('org'));
    })->middleware('isUser');


    // admin dashboard - transaction pannel
    Route::get('/admin-organization-application', function () {
        $org_app = DB::table('org_applications')
        ->select('org_applicationID', 'president_lastname','president_firstname','president_course','president_year','president_contactno',
        'president_email','org_name','org_motto','org_mission','org_vision','org_background','org_application_letter','org_officer_list',
        'org_constituon_bylaws', 'org_plan', 'org_fundreport','application_status','created_at')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.transaction-organization-application', compact('org_app'));
    });

    Route::get('/admin-organization-application',[LaravelCrud::class,'manage_org_application'])->middleware(['isLoggedIn','disable_back_btn','isUser']);
    

    // admin dashboard - ID Card Services

    // admin dashboard - ID Card Services - Validation Route
    Route::get('/admin-IDCard-services', function () {
        $studentsdata = DB::table('id_validations')
        ->select('*')
        ->get();
        return view('admin.transaction-IDcard-services', compact('studentsdata'));
    })->middleware('isUser');

    Route::get('/approved_validation/{student_id}/{current_yearlevel}',[LaravelCrud::class,'approved_requests']);



    // admin dashboard - ID Card Services- Printing Route
    Route::get('/admin-IDCard-printing', function () {
        $studentsdata = DB::table('id_printings')
        ->select('*')
        ->get();

        $std_data = DB::table('users')
        ->select('*')
        ->get();

        return view('admin.transaction-IDcard-printing', compact('studentsdata','std_data'));
    })->middleware('isUser');
    Route::get('/export-user',[LaravelCrud::class,'export_user'])->name('export_user')->middleware('isUser');
    Route::get('/print-status/{student_id}/{status}',[LaravelCrud::class,'print_status'])->middleware('isUser');


    // admin dashboard - ID Card Services- Reissuance Route
    Route::get('/admin-IDCard-reissuance', function () {
        $studentsdata = DB::table('id_reissuances')
        ->select('*')
        ->get();

        $std_data = DB::table('users')
        ->select('*')
        ->get();

        return view('admin.transaction-IDcard-reissuance', compact('studentsdata','std_data'));
    });
    Route::get('/reissuance-status/{student_id}/{status}',[LaravelCrud::class,'reissuance_status'])->middleware('isUser');


    // admin dashboard - SAO Certificate
    Route::get('/admin-SAOcertificate', function () {
        return view('admin.transaction-SAOcertificate');
    })->middleware('isUser');


    // admin dashboard - records pannel
    Route::get('/admin-graduationphotos', function () {
        return view('admin.records-graduationphotos');
    })->middleware('isUser');


    // admin dashboard - survey pannel
    Route::get('/admin-survey-result', function () {
        return view('admin.survey-result');
    })->middleware('isUser');

    Route::get('/admin-survey-manage', function () {
        return view('admin.survey-manage');
    })->middleware('isUser');

    // admin dashboard - accounts pannel
    Route::get('/admin-accounts-add', function () {
        return view('admin.accounts-add');
    })->middleware('isUser');

    Route::get('/admin-accounts-list', function () {
        $studentsdata = DB::table('users')
        ->select('*')
        ->where('role', '=', '0')
        ->get();
        return view('admin.accounts-list', compact('studentsdata'));
    })->middleware('isUser');

    // admin dashboard - approved sao cert
    Route::get('/admin-SAOcertificate', function () {
        $studentsdata = DB::table('sao_certificate')
        ->select('*')
        ->get();
        return view('admin.transaction-SAOcertificate', compact('studentsdata'));
    })->middleware('isUser');

    Route::get('/approved-request-status/{student_id}/{status}',[LaravelCrud::class,'confirm_sao_cert_request'])->middleware('isUser');


   
    // manage announcement urls
    Route::get('/admin-announcement/add',[LaravelCrud::class,'index'])->middleware(['isLoggedIn','disable_back_btn','isUser']);
    Route::post('/admin-announcement/add',[LaravelCrud::class,'add'])->middleware(['isLoggedIn','disable_back_btn','isUser']);
    Route::get('/admin-announcement/manage',[LaravelCrud::class,'manage'])->middleware(['isLoggedIn','disable_back_btn','isUser']);
    Route::get('/admin-announcement/archive',[LaravelCrud::class,'archive'])->middleware(['isLoggedIn','disable_back_btn','isUser']);

    Route::get('/archives',[LaravelCrud::class,'archives'])->name('archives');


    // manage publication urls
    Route::get('/admin-publication/add',[LaravelCrud::class,'indexpubs'])->middleware(['isLoggedIn','disable_back_btn','isUser']);
    Route::post('/admin-publication/add_publication',[LaravelCrud::class,'add_publication'])->middleware(['isLoggedIn','disable_back_btn','isUser']);
    Route::get('/admin-publication/manage',[LaravelCrud::class,'manage_publication'])->middleware(['isLoggedIn','disable_back_btn','isUser']);

    // manage organization urls
    Route::get('/admin-organization/add',[LaravelCrud::class,'indexorg'])->middleware(['isLoggedIn','disable_back_btn','isUser']);
    Route::post('/admin-organization/add_organization',[LaravelCrud::class,'add_organization'])->middleware(['isLoggedIn','disable_back_btn','isUser']);
    Route::get('/admin-organization/manage',[LaravelCrud::class,'manage_organization'])->middleware(['isLoggedIn','disable_back_btn','isUser']);

    // manage scholarship urls
    Route::get('/admin-scholarship/add',[LaravelCrud::class,'indexscholar'])->middleware(['isLoggedIn','disable_back_btn','isUser']);
    Route::post('/admin-scholarship/add_scholarship',[LaravelCrud::class,'add_scholarship'])->middleware(['isLoggedIn','disable_back_btn','isUser']);
    Route::get('/admin-scholarship/manage',[LaravelCrud::class,'manage_scholarship'])->middleware(['isLoggedIn','disable_back_btn','isUser']);


    // Announcement Update Function

    Route::get('/click_update/{announcement_id}', [LaravelCrud::class,'edit_function'] )->middleware('isUser');
    Route::post('/update/{announcement_id}',[LaravelCrud::class,'update_function'])->middleware('isUser');

    // Publication Update Function

    Route::get('/click_update_pub/{publication_id}', [LaravelCrud::class,'edit_function_pub'] )->middleware('isUser');
    Route::post('/update_pub/{publication_id}',[LaravelCrud::class,'update_function_pub'])->middleware('isUser');

     // Scholarship Update Function

     Route::get('/click_update_schl/{scholarship_id}', [LaravelCrud::class,'edit_function_schl'] )->middleware('isUser');
     Route::post('/update_schl/{scholarship_id}',[LaravelCrud::class,'update_function_schl'])->middleware('isUser');
 

      // Organization Update Function

      Route::get('/click_update_org/{organization_id}', [LaravelCrud::class,'edit_function_org'] )->middleware('isUser');
      Route::post('/update_org/{organization_id}',[LaravelCrud::class,'update_function_org'])->middleware('isUser');

      
      // Organization Application Update Function
      Route::get('/click_update_org_application/{org_applicationID}', [LaravelCrud::class,'edit_function_org_status'] )->middleware('isUser');
      Route::post('/update_org_application/{org_applicationID}',[LaravelCrud::class,'update_function_org_status'])->middleware('isUser');
    

      // admin dashboard - sending email for org app
    Route::get('/update_org_application_incomplete/{org_applicationID}',[LaravelCrud::class,'update_function_org_status_inc'])->middleware('isUser');
    Route::post('/send', [ContactController::class, 'send'])->name('send.email')->middleware('isUser');
    Route::post('/send-approval', [ContactController::class, 'sendApproved'])->name('sendApproved.email')->middleware('isUser');

    // admin - generate pdf
    Route::get('/export-certificate/{student_name}',[LaravelCrud::class,'export_certificate'])->name('export_certificate')->middleware('isUser');

});


 // start of user navigation

    // user announcements

    Route::get('/user-announcements', function () {
        $announce = DB::table('announcement')
        ->select('announcement_title', 'announcement_poster','announcement_details','announcement_content','announcement_link','createdat')
        ->orderBy('createdat', 'desc')
        ->where('announcement_status', '=', '0')
        ->get();
        return view('user.user_announcements', compact('announce'));
    })->middleware('isAdmin');

    // user publication
    Route::get('/user-publications', function () {
        $pubs = DB::table('publication')
        ->select('publication_title', 'publication_photo','publication_file','publication_date')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('user.user_publications', compact('pubs'));
    })->middleware('isAdmin');

    // user scholarship
    Route::get('/user-scholarship', function () {
        $scholar = DB::table('scholarship')
        ->select('scholarship_name', 'scholarship_photo','scholarship_file')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('user.user_scholarship', compact('scholar'));
    })->middleware('isAdmin');

    // user organization
    Route::get('/user-organization', function () {
        $org = DB::table('organization')
        ->select('organization_name', 'organization_logo','organization_details','organization_link')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('user.user_organization', compact('org'));
    })->middleware('isAdmin');

    // user organization application
    Route::view('/user-organization/register','user.user_organization_application')->name('register')->middleware('isAdmin');
    Route::view('/user-organization-application/success','user.user_transaction-org-application-success')->name('org-application.success')->middleware('isAdmin');

    // user ID Card Services
    Route::view('/user-services/IDcard','user.user_services_id')->name('idcard')->middleware('isAdmin');

    // user ID Card Services - Validation
    Route::view('/user-services/IDcard-Validation','user.user_services_id')->name('idcardvalidation')->middleware('isAdmin');
    Route::get('/search', [DataController::class,'search'])->name('websearch')->middleware('isAdmin');
    
    // user ID Card Services - Send Validation Request
    Route::get('/send_validation/{student_id}', [LaravelCrud::class,'send_requests'])->middleware('isAdmin');
    Route::post('/update_validation/{student_id}',[LaravelCrud::class,'process_requests'])->name('send_validation_request')->middleware('isAdmin');


     // user ID Card Services - Printing
    Route::view('/user-services/IDcard-Printing','user.user_services_id_printing')->name('idcardprinting')->middleware('isAdmin');
    
    Route::get('/proceedto_applicationform',[LaravelCrud::class,'confirm_request'])->name('confirm_request')->middleware('isAdmin');
    Route::view('/user-services/IDcard-Printing-Form','user.user_services_id_printing_applicationform')->middleware('isAdmin');
   
    // user ID Card Services - Reissuance
    Route::view('/user-services/IDcard-Reissuance','user.user_services_id_reissuance')->name('idcardreissuance')->middleware('isAdmin');

    Route::get('/reissuance_proceedto_applicationform',[LaravelCrud::class,'reissuance_confirm_request'])->name('reissuance_confirm_request')->middleware('isAdmin');
    Route::view('/user-services/IDcard-Reissuance-Form','user.user_services_id_reissuance_applicationform')->middleware('isAdmin');


    // user Services - SAO Certificate
    Route::view('/user-services/SAOCertificate','user.user_services_certificate')->name('saocert')->middleware('isAdmin');

    Route::get('/proceedto_saorequest_form',[LaravelCrud::class,'saocert_confirm_request'])->name('saocert_confirm_request')->middleware('isAdmin');
    Route::view('/user-services/SAOCertificate-requestform','user.user_services_certificate_requestform')->middleware('isAdmin');
    Route::post('/user-services/send_saocert_request',[LaravelCrud::class,'send_saocert_request'])->middleware('isAdmin');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
