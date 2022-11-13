<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\VerifyUser;
use Carbon\Carbon;
use App\Category;
use App\Mail\VerifyEmail;
use Hash;
use Session;
use Gate;
use DB;

class CustomAuthController extends Controller
{
   public function login(){
        return view("auth.login");
    }

    public function registration(){
        $data = DB::table('department')->get();
        return view("auth.registration")->with('data', $data);
    }

    public function GetSubCatAgainstMainCatEdit($id){
        echo json_encode(DB::table('course')->where('dept_id', $id)->get());
    }

    // verify/email
    public function verifyEmail($token){
        $verifiedUser = VerifyUser::where('token', $token)->first();
        if (isset($verifiedUser)){
            $user_data = $verifiedUser->user;
            if(!$user_data->email_verified_at){
                $user_data->email_verified_at = Carbon::now();
                $user_data->save();

                return \redirect('login')->with('success','Your email has been verified');
            }
            else{
                return \redirect()->back()->with('info','Your email has already been verified');
            }
        }
        else{
            return \redirect(route('user_login'))->with('error','Something went wrong!');
        }
    }

    // user/store
    public function registerUser(Request $request){
        $request->validate([
            'student_id'=>'required',
            'last_name'=>'required',
            'first_name'=>'required',
            'middle_name'=>'required',
            'department'=>'required',
            'course'=>'required',
            'year'=>'required',
            'birth_date'=>'required|date|before:tomorrow',

            'email'=>'required|email|unique:users|regex:/(.*)@cec.edu.ph/i'
        ]);

        $hell=VerifyUser::create([
            'token' => Str::random(60),
            'user_id' => $request->student_id,
            
        
        ]);

        if($this->isOnline()){
            $mail_data=[
                'fromName' => 'cecstudentaffairsoffice@gmail.com',
                'subject' => 'A message from Student Affairs Office',
                'recipient'=> $request->email,
                'tkn' => $hell->token
            ];

            \Mail::send('email-verify-template',$mail_data, function($message) use($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });
        

        $user = new User();
        $user->student_id = $request->student_id;
        $user->id = $request->student_id;
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->department = $request->department;
        $user->course = $request->course;
        $user->year_level = $request->year;
        $user->birth_date = $request->birth_date;
        $user->email = $request->email;
        $user->username = $request->student_id;
        $user->password = Hash::make($request->last_name);

        $res = $user->save();

            if ($res){
                return \redirect('login')->with('success','Please click on the link sent to your email to verify you account!');
            }else{
                return back()->with('fail','Something wrong');
            }
        }else{
            return redirect()->back()->withInput()->with('error','Check your internet connection');
        }
    }

    public function isOnline($site = "https://youtube.com/"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }

    //login/validate
    public function loginUser(Request $request){
        $request->validate([
            'student_id'=>'required',
            'password'=>'required'
        ]);
        $user = User::where('student_id','=',$request->student_id)->first();
        
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->student_id);
                $request->session()->put('email',$user->email);
                $request->session()->put('name',$user->last_name.', '.$user->first_name);
                $request->session()->put('fullname',$user->first_name.' '.$user->middle_name.' '.$user->last_name);
                $request->session()->put('id',$user->student_id);
                $request->session()->put('course',$user->course);
                $request->session()->put('yearlevel',$user->year_level);


                if ($user->email_verified_at == null){
                    Auth::logout();
                    return \redirect('login')->with('fail','Please verify your email to continue');
                }
                    if($user->role == '1'){
                        return redirect('admin');
                    }elseif($user->role == '0'){
                        return redirect('user-announcements');
                    }else{
                        return back()->with('fail',"This Student is not registered.");
                    }

            }else{
                return back()->with('fail',"Password don't match");
            }

        }else{
            return back()->with('fail','This Student ID is not registered.');
        }
    

    }

    public function admin_dashboard(){

        $data = array();
        if (Session::has('loginId')){
            $data = User::where('student_id','=', Session::get('loginId'))->first();

            
        }
        return view('admin.dashboard', compact('data'));
    }

    public function user_dashboard(){

        $data = array();
        if (Session::has('loginId')){
            $data = User::where('student_id','=', Session::get('loginId'))->first();

            
        }
        return view('user.userdashboard', compact('data'));
    }
 

    public function logout(){
        if (Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }

    private function getDepartments()
    {

        $departments = DB::table('departments')
            ->get();
        return $departments;

    }

    private function getCourse(Request $request)
    {

        $course = DB::table('course')
            ->where('dept_id', $request->dept_id)
            ->get();
        
        if (count($course) > 0){
            return response()->json($course);
        }

    }
}
