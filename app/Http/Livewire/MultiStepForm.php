<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\org_application;

class MultiStepForm extends Component
{
    use WithFileUploads;

    public $president_firstname;
    public $president_lastname;
    public $president_course;
    public $president_year;
    public $president_contactno;
    public $president_email;
    public $org_name;
    public $org_motto;
    public $org_background;
    public $org_mission;
    public $org_vision;
    public $org_application_letter;
    public $org_officer_list;
    public $org_constitution_bylaws;
    public $org_plan;
    public $org_fundreport;
    public $confirmation;

    public $totalSteps = 4;
    public $currentStep =1;


    protected $rules = [
        'president_firstname'=>'required|string',
        'president_lastname'=>'required|string',
        'president_course'=>'required',
        'president_year'=>'required',
        'president_contactno'=>'required|digits:11',
        'president_email'=>'required|email|regex:/(.*)@cec.edu.ph/i',
        'org_name'=>'required|string',
        'org_motto'=>'required|string',
        'org_background'=>'required',
        'org_mission'=>'required',
        'org_vision'=>'required',
        'org_application_letter'=>'required|mimes:pdf|max:1024',
        'org_officer_list'=>'required|mimes:pdf|max:1024',
        'org_constitution_bylaws'=>'required|mimes:pdf|max:1024',
        'org_plan'=>'required|mimes:pdf|max:1024',
        'org_fundreport'=>'required|mimes:pdf|max:1024',
    ];

    public function updated($property)
    {
    $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.multi-step-form');
    }

    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function validateData(){
        if ($this->currentStep == 1){
            $this->validateOnly('president_firstname');
            $this->validateOnly('president_lastname');
            $this->validateOnly('president_course');
            $this->validateOnly('president_year');
            $this->validateOnly('president_contactno');
            $this->validateOnly('president_email');


        }
        else if ($this->currentStep == 2){
                $this->validateOnly('org_name');
                $this->validateOnly('org_motto');
                $this->validateOnly('org_background');
                $this->validateOnly('org_mission');
                $this->validateOnly('org_vision');
        }
        else if ($this->currentStep == 3){
            $this->validateOnly('org_application_letter');
            $this->validateOnly('org_officer_list');
            $this->validateOnly('org_constitution_bylaws');
            $this->validateOnly('org_plan');
            $this->validateOnly('org_fundreport');
        }
    }

    public function register(){
        $this->validate([
            'confirmation' => 'accepted'
        ]);
        $this->resetErrorBag();

        $org_application_letter_name ='org_application_letter_'.$this->org_application_letter->getClientOriginalName();
        $org_officer_list_name = 'org_officer_list_'.$this->org_officer_list->getClientOriginalName();
        $org_consti_bylaws_name = 'org_constitution_bylaws_'.$this->org_constitution_bylaws->getClientOriginalName();
        $org_plan_name = 'org_plan_'.$this->org_plan->getClientOriginalName();
        $org_fund_report_name = 'org_fundreport_'.$this->org_fundreport->getClientOriginalName();


        $file_upload = $this->org_application_letter->storeAs('public/assets/org_application_letters', $org_application_letter_name);
        $file_upload = $this->org_officer_list->storeAs('public/assets/org_officer_list', $org_officer_list_name);
        $file_upload = $this->org_constitution_bylaws->storeAs('public/assets/org_constitution_bylaws', $org_consti_bylaws_name);
        $file_upload = $this->org_plan->storeAs('public/assets/org_plan', $org_plan_name);
        $file_upload = $this->org_fundreport->storeAs('public/assets/org_fundreport_', $org_fund_report_name);

        if($file_upload){
            $values = array(
                "president_lastname"=>$this->president_lastname,
                "president_firstname"=>$this->president_firstname,
                "president_course"=>$this->president_course,
                "president_year"=>$this->president_year,
                "president_contactno"=>$this->president_contactno,
                "president_email"=>$this->president_email,
                "org_name"=>$this->org_name,
                "org_motto"=>$this->org_motto,
                "org_mission"=>$this->org_mission,
                "org_vision"=>$this->org_vision,
                "org_background"=>$this->org_background,
                "org_application_letter"=> $org_application_letter_name,
                "org_officer_list"=> $org_officer_list_name,
                "org_constituon_bylaws"=> $org_consti_bylaws_name,
                "org_plan"=> $org_plan_name,
                "org_fundreport"=> $org_fund_report_name,
            );

            org_application::insert($values);
            // $this->reset();
            // $this->currentStep = 1;
            $info = ['name'=>$this->president_lastname.','.$this->president_firstname,'email'=>$this->president_email];
            return redirect()->route('org-application.success', $info);

        }
    }
}
