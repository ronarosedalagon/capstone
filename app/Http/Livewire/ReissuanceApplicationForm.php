<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\id_reissuance;

class ReissuanceApplicationForm extends Component
{
    use WithFileUploads;

    public $student_id;
    public $student_lastname;
    public $student_firstname;
    public $docu_affidavit;
    public $docu_paymentreceipt;

    public $totalSteps = 2;
    public $currentStep = 1;

    public function mount(){
        $this->currentStep = 1;
    }

    public function render()
    {
        return view('livewire.reissuance-application-form');
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
            $this->validate([
                'student_id'=>'required|string',
                'student_lastname'=>'required|string',
                'student_firstname'=>'required|string',
            ]);
        }
    }


    public function reissuance_submit(){
        if ($this->currentStep == 2){
            $this->validate([
                'docu_affidavit'=>'required|mimes:pdf|max:1024',
                'docu_paymentreceipt'=>'required|image|max:1024',
            ]);
        }
        $this->resetErrorBag();
        $this->resetValidation();

        $docu_affidavit_name = $this->student_id.'_'.$this->docu_affidavit->getClientOriginalName();
        $docu_receipt_name = $this->student_id.'_'.$this->docu_paymentreceipt->getClientOriginalName();

        $file_upload = $this->docu_affidavit->storeAs('public/assets/reissuance_docu_affidavit', $docu_affidavit_name);
        $file_upload = $this->docu_paymentreceipt->storeAs('public/assets/reissuance_docu_receipt', $docu_receipt_name);
        $request_stat="pending";
        

        if($file_upload){
            $values = array(
                "student_id"=>$this->student_id,
                "student_lastname"=>$this->student_lastname,
                "student_firstname"=>$this->student_firstname,
                "docu_affidavit"=> $docu_affidavit_name,
                "docu_paymentreceipt"=> $docu_receipt_name,
            );

            $query=id_reissuance::insert($values);

            DB::update('update users set card = ? where student_id = ?'
            , [$request_stat, $values['student_id']]);

            $this->reset();
            $this->currentStep=1;

            if($query){
                return redirect('/user-services/IDcard-Reissuance')->with('success','Your request has been successfully sent!');
            }else{
                return back()->with('fail','Request Failed, Please Try Again.');
            }
        }
    }
}
