<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\announcements;

class AddAnnouncementForm extends Component
{
    use WithFileUploads;

    public $file;
    public $title;
    public $date;
    public $venue;
    public $details;
    public $content;
    public $link;
    public $audience;

    public $totalSteps = 2;
    public $currentStep = 1;

    
    public function mount(){
        $this->currentStep = 1;
    }

    public function render()
    {
        return view('livewire.add-announcement-form');
    }

    public function increaseSteps(){
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseSteps(){
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }


    public function validateData(){
        if ($this->currentStep == 1){
            $this->validate([
                'file' => 'required|mimes:png,jpg,jpeg|max:1024',
                'title' => 'required|string',
                'details' => 'required|string',
                'date' => 'required|string',
                'venue' => 'required|string',
                'content' => 'required',
            ]);
        }
    }

    public function submit_Announcement(){
        if($this->currentStep == 2){
                $this->validate([
                    'audience' => 'required',
                ]);
        }

        $this->resetErrorBag();
        $this->resetValidation();

        $poster_photo_name = $this->title.'_'.$this->file->getClientOriginalName();

        $file_upload = $this->file->storeAs('public/assets/announcements', $poster_photo_name);

        if($file_upload){
            $values = array(
                "title"=>$this->title,
                "details"=>$this->details,
                "date"=>$this->date,
                "venue"=>$this->venue,
                "content"=>$this->link,
                "audience"=>$this->audience,
                "file"=>$poster_photo_name,
            );
        }

        $query=announcements::insert($values);

        $this->reset();
        $this->currentStep=1;



        if($query){
            return redirect('/admin-announcement-add')->with('success','Announcement has been successfully posted and notify the audience!');
        }else{
            return back()->with('fail','Request Failed, Please Try Again.');
        }    


    }
}
