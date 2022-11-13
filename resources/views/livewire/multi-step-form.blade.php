<div>
    <form wire:submit.prevent="register">

    <!-- form step 1 -->
    @if ($currentStep == 1) 
    <div class="step-one">
        <div class="card">
            <div class="card-header bg-secondary text-white"> Step 1/3 - Club President | Personal Details </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" 
                            wire:model="president_firstname">
                            <span class="text-danger">@error('president_firstname'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter Last Name"
                            wire:model="president_lastname">
                            <span class="text-danger">@error('president_lastname'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Course</label>
                            <select class="form-control" wire:model="president_course">
                                <option value="" selected>Choose Course</option>
                                <option value="BSIT">BS Information Technology</option>
                                <option value="BSCRIM">BS Criminology</option>
                                <option value="BSMT">BS Marine Transportation</option>
                                <option value="BSMARE">BS Marine Engineering</option>
                                <option value="BSBA">BS Business Administration</option>
                                <option value="BSHM">BS Hospitality Management</option>
                                <option value="BSTM">BS Tourism Management</option>
                                <option value="BEED">BE Education</option>
                                <option value="BSEdENG">BSEd English</option>
                                <option value="BPED">Bachelor on Physical Education</option>
                                <option value="THEO">AB Theo</option>
                            </select>
                            <span class="text-danger">@error('president_course'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Year</label>
                            <select class="form-control" wire:model="president_year">
                                <option value="" selected> Year Level </option>
                                <option value="1st year">1st year</option>
                                <option value="2nd year">2nd year</option>
                                <option value="3rd year">3rd year</option>
                                <option value="4th year">4th year</option>
                            </select>
                            <span class="text-danger">@error('president_year'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Contact Number</label>
                            <input type="text" class="form-control" placeholder="Enter Contact Number"
                            wire:model="president_contactno">
                            <span class="text-danger">@error('president_contactno'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" placeholder="Enter Email"
                            wire:model="president_email">
                            <span class="text-danger">@error('president_email'){{ $message }}@enderror</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- form step 2 -->
    @if ($currentStep == 2) 
    <div class="step-two">
        <div class="card">
            <div class="card-header bg-secondary text-white"> Step 2/3 - Organization Details </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Organization Name</label>
                            <input type="text" class="form-control" placeholder="Enter Organization Name"
                            wire:model="org_name">
                            <span class="text-danger">@error('org_name'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Organization Motto</label>
                            <input type="text" class="form-control" placeholder="Enter Organization Motto"
                            wire:model="org_motto">
                            <span class="text-danger">@error('org_motto'){{ $message }}@enderror</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Organization Background</label>
                    <textarea class="form-control" cols="2" rows="2" wire:model="org_background"></textarea>
                    <span class="text-danger">@error('org_background'){{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="">Organization Mission</label>
                    <textarea class="form-control" cols="2" rows="2"  wire:model="org_mission"></textarea>
                    <span class="text-danger">@error('org_mission'){{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="">Organization Vision</label>
                    <textarea class="form-control" cols="2" rows="2"  wire:model="org_vision"></textarea>
                    <span class="text-danger">@error('org_vision'){{ $message }}@enderror</span>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- form step 3 -->
    @if ($currentStep == 3) 
    <div class="step-three">
        <div class="card">
            <div class="card-header bg-secondary text-white"> Step 3/3 - Upload Organization Files </div>
            <div class="card-body row">
                <div class="form col-md-12">
                    <label for="">Organization Application Letter</label>
                    <input type="file" class="form-control"
                    wire:model="org_application_letter">
                    <span class="text-danger">@error('org_application_letter'){{ $message }}@enderror</span>
                </div>
                <div class="form col-md-6"  style="margin-top:2%;">
                    <label for="">Organization Officer List</label>
                    <input type="file" class="form-control"
                    wire:model="org_officer_list">
                    <span class="text-danger">@error('org_officer_list'){{ $message }}@enderror</span>
                </div>
                <div class="form col-md-6"  style="margin-top:2%;">
                    <label for="">Constitution and Bylaws</label>
                    <input type="file" class="form-control"
                    wire:model="org_constitution_bylaws">
                    <span class="text-danger">@error('org_constitution_bylaws'){{ $message }}@enderror</span>
                </div>
                
                <div class="form col-md-6" style="margin-top:2%;">
                    <label for="">Organization Plan</label>
                    <input type="file" class="form-control"
                    wire:model="org_plan">
                    <span class="text-danger">@error('org_plan'){{ $message }}@enderror</span>
                </div>
                <div class="form col-md-6" style="margin-top:2%;">
                    <label for="">Organization Fund Report</label>
                    <input type="file" class="form-control"
                    wire:model="org_fundreport">
                    <span class="text-danger">@error('org_fundreport'){{ $message }}@enderror</span>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- form step 3 -->
    @if ($currentStep == 4) 
    <div class="step-four">
        <div class="card">
            <div class="card-header bg-info text-white"> Confirmation Page - Please review the details of your application. </div>
            
            <!-- confirmation page - row 1 -->
            <div class="card-body row">
                <div class="form col-md-12" style="margin-top:1%;">
                <div class="card-header bg-secondary text-white"> Club President | Personal Details </div> <br>
                    <div class="row">
                        <div class="form col-md-2">
                        <label>Last Name:</label>
                        </div>
                        <div class="form col-md-10">
                        <span style="color:black; font-weight:bolder;"><?php $data=$this->president_lastname; echo $data;?> </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form col-md-2">
                        <label>First Name:</label>
                        </div>
                        <div class="form col-md-10">
                        <span style="color:black; font-weight:bolder;"><?php $data=$this->president_firstname; echo $data;?> </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form col-md-2">
                        <label>Course:</label>
                        </div>
                        <div class="form col-md-10">
                        <span style="color:black; font-weight:bolder;"><?php $data=$this->president_course; echo $data;?> </span>                 
                        </div>
                    </div>
                    <div class="row">
                        <div class="form col-md-2">
                        <label>Year:</label>
                        </div>
                        <div class="form col-md-10">
                        <span style="color:black; font-weight:bolder;"><?php $data=$this->president_year; echo $data;?> </span>                
                        </div>
                    </div>
                    <div class="row">
                        <div class="form col-md-2">
                        <label>Contact No:</label>
                        </div>
                        <div class="form col-md-10">
                        <span style="color:black; font-weight:bolder;"><?php $data=$this->president_contactno; echo $data;?> </span>                
                        </div>
                    </div>
                    <div class="row">
                        <div class="form col-md-2">
                        <label>Email:</label>
                        </div>
                        <div class="form col-md-10">
                        <span style="color:black; font-weight:bolder;"> <?php $data=$this->president_email; echo $data;?> </span>                
                        </div>
                    </div>
                </div>
            </div>

            <!-- confirmation page - row 2 -->
            <div class="card-body row">
                <div class="form col-md-12" style="margin-top:1%;">
                <div class="card-header bg-secondary text-white"> Organization Details </div> <br>
                    <div class="row">
                        <div class="form col-md-2">
                        <label>Organization Name:</label>
                        </div>
                        <div class="form col-md-10">
                        <span style="color:black; font-weight:bolder;"><?php $data=$this->org_name; echo $data;?> </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form col-md-2">
                        <label>Motto:</label>
                        </div>
                        <div class="form col-md-10">
                        <span style="color:black; font-weight:bolder; "><?php $data=$this->org_motto; echo $data;?> </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form col-md-2">
                        <label>Background</label>
                        </div>
                        <div class="form col-md-10">
                        <span style="color:black; font-weight:bolder;"><?php $data=$this->org_background; echo $data;?> </span>                 
                        </div>
                    </div>
                    <div class="row">
                        <div class="form col-md-2">
                        <label>Mission:</label>
                        </div>
                        <div class="form col-md-10">
                        <span style="color:black; font-weight:bolder;"><?php $data=$this->org_mission; echo $data;?> </span>                
                        </div>
                    </div>
                    <div class="row">
                        <div class="form col-md-2">
                        <label>Vision:</label>
                        </div>
                        <div class="form col-md-10">
                        <span style="color:black; font-weight:bolder;"><?php $data=$this->org_vision; echo $data;?> </span>                
                        </div>
                    </div>
                </div>
            </div>

            <!-- confirmation page - checkbox -->
            <div class="form-group">
            <label for="confirmation" class="d-block" style="margin-left:2%;color:green;">
                <input type="checkbox" id="confirmation" wire:model="confirmation"> I hereby certify that the information provided in this form is complete, true
                and correct to the best of my knowledge.
            </label>
            <span class="text-danger"  style="margin-left:2%;">@error('confirmation'){{$message}}@enderror</span>
            </div>
            

        </div>
    </div>
    @endif

    <div class="action-button d-flex justify-content-between bg-white pt-2 pb-2">
        @if ($currentStep == 1)
        <div></div>
        @endif

        @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
        <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
        @endif

        @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
        <button type="button" class="btn btn-md btn-secondary" wire:click="increaseStep()">Next</button>
        @endif

        @if ($currentStep == 4)
        <button type="button" class="btn btn-md btn-secondary" wire:click="register()">Submit</button>
        @endif  
        
    </div>

    </form>
    
</div>
