<div>
<form wire:submit.prevent="submitform">
    <div>
    @if(Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success')}}
                </div>
            @endif

            @if(Session::get('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('fail')}}
                </div>
    @endif

    @if ($currentStep == 1) 
    <!-- step 1 -->
    <div class="card-header bg-secondary text-white"> Step 1/3 - Student | Personal Details </div>
    <div class="card-body">
        <div class="row">   
            <div class="col-sm-6">
                <label class="form-label" for="customFile">Student ID</label>
                <input type="text" class="form-control" wire:model="student_id"> 
                <span style="color:red">@error('student_id'){{ $message }} @enderror</span>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-4">
                <label class="form-label" for="customFile">Last Name</label>
                <input type="text" class="form-control" wire:model="student_lastname">  
                <span style="color:red">@error('student_lastname'){{ $message }} @enderror</span>
            </div>
            <div class="col-sm-4">
                <label>First Name</label>
                <input type="text" class="form-control" wire:model="student_firstname">
                <span style="color:red">@error('student_firstname'){{ $message }} @enderror</span>
            </div>
            <div class="col-sm-4">
                <label>Middle Name</label>
                <input type="text" class="form-control" wire:model="student_middlename">
                <span style="color:red">@error('student_middlename'){{ $message }} @enderror</span>
            </div>
        </div><br>



        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Course</label>
                    <select class="form-control" wire:model="student_course">
                        <option value="" selected> Select Course Taken </option>
                        <option value="School of Basic Education">School of Basic Education</option>
                        <option value="BEED">BEED</option>
                        <option value="BSED-MAPEH">BSED-MAPEH</option>
                        <option value="BSED-ENGLISH">BSED-ENGLISH</option>
                        <option value="BS-Criminology">BS-Criminology</option>
                        <option value="BS-Information Technology">BS-Information Technology</option>
                        <option value="BS-Marine Transportation">BS-Marine Transportation</option>
                        <option value="BS-Marine Engineering">BS-Marine Engineering</option>
                        <option value="BS-Business Administration">BS-Business Administration</option>
                        <option value="BS-Hospitality Management">BS-Hospitality Management</option>
                        <option value="BS-Tourism Management">BS-Tourism Management</option>

                    </select>
                    <span class="text-danger">@error('student_course'){{ $message }}@enderror</span>
                </div>
            </div><br>
            <div class="col-sm-6">
                <label>Date of Birth</label>
                <input type="date" class="form-control" min='1950-01-01' max='2017-01-01' wire:model="student_birthdate">
                <span style="color:red">@error('student_birthdate'){{ $message }} @enderror</span>
                <br>
            </div><br>
        </div>


        <div class="row">
        <div class="col-sm-12">
            <label>Address</label>
            <input type="text" class="form-control" wire:model="student_address">
            <span style="color:red">@error('student_address'){{ $message }} @enderror</span>
            <br>
        </div>

        <div class="form-group col-sm-6">
            <label>Purpose of Filling out the form:</label> <br> 
            <select class="form-control" wire:model="student_purpose">
                <option value="" selected> Select your purpose: </option>
                <option value="Printing">Printing</option>
                <option value="Reissuance">Reissuance</option>
            </select>
            <span style="color:red">@error('student_purpose'){{ $message }} @enderror</span>
        </div>
        </div>
        <br>
    </div>
    @endif


    <!-- step 2 -->
    @if ($currentStep == 2) 
    <div class="card-header bg-secondary text-white"> Step 2/3 - Student | Contact Person in Case of Emergency </div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm-6">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter Contact Person's Name"  wire:model="contactperson_name">
                <span style="color:red">@error('contactperson_name'){{ $message }} @enderror</span>
                <br>
            </div>
            <div class="col-sm-6">
                <label>Phone Number</label> 
                <input type="text" class="form-control" placeholder="Enter Contact Number" wire:model="contactperson_no">
                <span style="color:red">@error('contactperson_no'){{ $message }} @enderror</span>
                <br>
            </div>
        </div>

            <label>Address</label> 
            <input type="text" class="form-control" placeholder="Enter Address" wire:model="contactperson_address">
            <span style="color:red">@error('contactperson_address'){{ $message }} @enderror</span>
            <br>
    </div>
    @endif




    <!-- step 3 -->
    @if ($currentStep == 3) 
    <div class="card-header bg-secondary text-white"> Step 3/3 - Student | ID Card Photo </div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm-6">
                <label>Upload your ID Photo</label>
                <input type="file" class="form-control" wire:model="student_photo">                
                <span style="color:red">@error('student_photo'){{ $message }} @enderror</span>
                <br>
            </div>
        </div>

    </div>
    @endif


    <div class="action-button d-flex justify-content-between bg-white pt-2 pb-2">
        @if ($currentStep == 1)
        <div></div>
        @endif

        @if ($currentStep == 2 || $currentStep == 3)
        <button type="button" class="btn btn-md btn-danger" wire:click="decreaseStep()">Back</button>
        @endif

        @if ($currentStep == 1 || $currentStep == 2)
        <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
        @endif

        @if ($currentStep == 3)
        <button type="button" class="btn btn-md btn-secondary" wire:click="submitform()">Submit</button>
        @endif  
        
    </div>

</div>
</form>
</div>

<script>
        var dateControler = {
                currentDate : null
            }

             $(document).on( "change", "#txtDate",function( event, ui ) {
                    var now = new Date();
                    var selectedDate = new Date($(this).val());

                    if(selectedDate > now) {
                        $(this).val(dateControler.currentDate)
                    } else {
                        dateControler.currentDate = $(this).val();
                    }
                });   
</script>