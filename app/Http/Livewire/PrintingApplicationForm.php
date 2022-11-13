<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\id_printing;

class PrintingApplicationForm extends Component
{
    use WithFileUploads;

    public $student_id;
    public $student_lastname;
    public $student_middlename;
    public $student_firstname;
    public $student_course;
    public $student_address;
    public $student_purpose;
    public $student_birthdate;
    public $student_photo;
    public $contactperson_name;
    public $contactperson_no;
    public $contactperson_address;

    public $totalSteps = 3;
    public $currentStep = 1;

    protected $rules = [
        'student_id'=>'required|string',
        'student_lastname'=>'required|string',
        'student_middlename'=>'required|string',
        'student_firstname'=>'required|string',
        'student_course'=>'required',
        'student_address'=>'required|string',
        'student_purpose'=>'required',
        'student_birthdate'=>'required|before:10-10-2017',

        'contactperson_name'=>'required|string',
        'contactperson_no'=>'required|digits:11',
        'contactperson_address'=>'required|string',

        'student_photo'=>'required|mimes:png,jpg,jpeg|max:1024',

    ];


    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.printing-application-form');
    }

    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function validateData(){
        if ($this->currentStep == 1){
            $this->validateOnly('student_id');
            $this->validateOnly('student_lastname');
            $this->validateOnly('student_middlename');
            $this->validateOnly('student_firstname');
            $this->validateOnly('student_course');
            $this->validateOnly('student_address');
            $this->validateOnly('student_purpose');
            $this->validateOnly('student_birthdate');
        }
        else if ($this->currentStep == 2){
            $this->validateOnly('contactperson_name');
            $this->validateOnly('contactperson_no');
            $this->validateOnly('contactperson_address');
        }
        
    }

    public function submitform(){
        $this->resetErrorBag();
            if ($this->currentStep == 3){
                $this->validateOnly('student_photo');
        }

        $id_photo_name = $this->student_id.'_'.$this->student_photo->getClientOriginalName();

        $file_upload = $this->student_photo->storeAs('public/assets/student_idphotos', $id_photo_name);
        $request_stat="pending";
        $sesh_id=session('id');

        if($file_upload){
            $values = array(
            "student_id"=>$sesh_id,
            "student_lastname"=>$this->student_lastname,
            "student_middlename"=>$this->student_middlename,
            "student_firstname"=>$this->student_firstname,
            "student_course"=>$this->student_course,
            "student_address"=>$this->student_address,
            "student_purpose"=>$this->student_purpose,
            "student_birthdate"=>$this->student_birthdate,
            "contactperson_name"=>$this->contactperson_name,
            "contactperson_no"=>$this->contactperson_no,
            "contactperson_address"=>$this->contactperson_address,
            "student_photo"=>$id_photo_name,
            "status"=>$request_stat,

            );

            $query=id_printing::insert($values);

            DB::update('update users set card = ? where student_id = ?'
            , [$request_stat, $values['student_id']]);
            
            $this->reset();
            $this->currentStep=1;

            if($query){
                return redirect('/user-services/IDcard-Printing')->with('success','Your request has been successfully sent!');
            }else{
                return back()->with('fail','Request Failed, Please Try Again.');
            }
        }
    }
}
