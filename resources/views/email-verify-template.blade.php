
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #141E30; color:white; padding:20px;"> <center> Student - Email Verification </center></div>

                <div class="card-body" style="color:black;">
                    <br>
                    <h3> Hello {{ $recipient }},  </h3>

                    <h5> Thank you for registering on Student Affairs Portal! </h5> 

                    <h5>
                    Your user account has been created. <br>
                    Account Default Password is your <b>LASTNAME</b> in uppercase.
                    </h5>

                    <h5>Just one last step to complete your registration, please click the button below to verify your school email address. </h5>
                    <br>
                    <a href="{{ url('/register-user/verify/'.$tkn) }}"> <button type="button" style="background-color:#ff4700; color:white; border-radius:30px; border:none; padding:15px 25px 15px 25px; margin-left: 5%; ">Verify My Email </button> </a>

                    <br> <br>

                    <h5> * This email may contain sensitive information that must not be shared to anyone else.	 </h5>

                    <br> <br>
                    <label>
                    <b>Sincerely,</b> <br>
 	                Student Affairs Office | Cristal e-College
                     </label>

                </div>
            </div>
        </div>
    </div>
</div>

