<div>
<form wire:submit.prevent="reissuance_submit">

    <!-- step 1 -->
    @if ($currentStep == 1) 
    <div class="card-header bg-secondary text-white"> Step 1/2 - Student | Personal Details </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
                <label class="form-label" for="customFile">Student ID</label>
                <input type="text" class="form-control" wire:model="student_id"> 
                <span style="color:red">@error('student_id'){{ $message }} @enderror</span>
            </div>
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
        </div><br>
    </div>
    @endif


    <!-- step 2 -->
    @if ($currentStep == 2) 
    <div class="card-header bg-secondary text-white"> Step 2/2 - Files | Reissuance Documents </div>
    <div class="card-body row">
        <div class="col-sm-6">
            <label>Affidavit of Loss</label>
            <input type="file" class="form-control" 
            wire:model="docu_affidavit">
            <span style="color:red">@error('docu_affidavit'){{ $message }} @enderror</span>
            <br>
        </div>
        <div class="col-sm-6">
            <label>Receipt</label> 
            <input type="file" class="form-control" 
            wire:model="docu_paymentreceipt">
            <span style="color:red">@error('docu_paymentreceipt'){{ $message }} @enderror</span>
            <br>
        </div>
    </div>
    @endif


    <div class="action-button d-flex justify-content-between pt-1 pb-1">
        @if ($currentStep == 1)
        <div></div>
        @endif

        @if ($currentStep == 2)
        <button type="button" class="btn btn-md btn-danger" wire:click="decreaseStep()">Back</button>
        @endif

        @if ($currentStep == 1)
        <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
        @endif

        @if ($currentStep == 2)
        <button type="button" class="btn btn-md btn-secondary" wire:click="reissuance_submit()">Submit</button>
        @endif  
        
    </div>

</form>
</div>
