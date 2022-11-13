<div>
<form wire:submit.prevent="submit_Announcement">

    <!-- step 1 -->
    @if ($currentStep == 1) 
    <div class="card-header bg-success text-white"> Step 1/2 - Announcement Details </div>
        <div class="card-body">

            <label class="form-label" for="customFile">Announcement Poster</label>
            <input type="file" class="form-control" wire:model="file"> <br>   
            <span style="color:red">@error('file'){{ $message }} @enderror</span>

            <div class="row">

                <div class="col-sm-4">
                <label>Announcement Title</label>
                <input type="text" class="form-control" wire:model="title">
                <span style="color:red">@error('title'){{ $message }} @enderror</span>
                </div>

                <div class="col-sm-4">
                <label>Event Date</label>
                <input type="date" class="form-control" wire:model="date">
                <span style="color:red">@error('date'){{ $message }} @enderror</span>
                </div>

                <div class="col-sm-4">
                <label>Event Venue</label>
                <input type="text" class="form-control" wire:model="venue">
                <span style="color:red">@error('venue'){{ $message }} @enderror</span>
                </div>

            </div>
                
            <br>
            <div class="row">

                <div class="col-sm-6">
                <label>Announcement Details</label>
                <input type="text" class="form-control" wire:model="details">
                <span style="color:red">@error('details'){{ $message }} @enderror</span>
                </div>

                <div class="col-sm-6">
                <label class="form-label" for="customFile">File Link (if applicable)</label>
                <input type="text" class="form-control" wire:model="link">
                <span style="color:red">@error('link'){{ $message }} @enderror</span>
                </div>

            </div>

            <br>
            <div class="row">
                <div class="col-sm-12" style="border:red 10px;" >
                <label>Announcement Content</label>
                <textarea  cols="30" rows="10" class="form-control" wire:model="content"></textarea>
                <span style="color:red">@error('content'){{ $message }} @enderror</span>
                </div>
            </div>
            
        </div>
    </div>
    @endif

    <!-- step 2 -->
    @if ($currentStep == 2) 
    <div class="card-header bg-secondary text-white"> Step 2/2 - Target Audience for Sending Emails </div>
        <div class="card-body">

            <div class="form-group">               
                <label>Target Audience</label> <br> 
                <select class="form col-md-6 selectpicker" class="form-control" wire:model="audience">
                    <option selected disabled> Notifications Recipient: </option>
                    <option value="1">1st year</option>
                    <option value="2">2nd year</option>
                    <option value="3">3rd year</option>
                    <option value="4">4th year</option>
                    <option value="graduated">Graduated</option>
                    <option value="inactive"> Inactive Students </option>
                    <option value="active"> Active Students </option>
                    <option value="everyone"> Everyone</option>
                </select>
                <span style="color:red">@error('audience'){{ $message }} @enderror</span>
            </div>

        </div>
    </div>
    @endif


    <div class="action-button d-flex justify-content-between bg-white pt-2 pb-2">
        @if ($currentStep == 1)
        <div></div>
        @endif

        @if ($currentStep == 2)
        <button type="button" class="btn btn-md btn-danger" wire:click="decreaseSteps()">Back</button>
        @endif

        @if ($currentStep == 1)
        <button type="button" class="btn btn-md btn-success" wire:click="increaseSteps()">Next</button>
        @endif

        @if ($currentStep == 2)
        <button type="submit" class="btn btn-md btn-secondary" wire:click="submit_Announcement()">Submit</button>
        @endif  
        
    </div>


</form>
</div>
