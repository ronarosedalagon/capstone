<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users PDF</title>
</head>
<body>
    <img src="{{ public_path('images/header.png') }}" style="width: 100%; margin-top:-5%;">
    <div class="row" style="font-size: 20px;">
        <center>
        This certifies that <b>{{ $name }}</b> was a student <br>
        of good moral and character after finding <b>no derogatory cases</b> <br>
        based on the records from the Guidance Office, Alumni Office <br>
        and the Office of the Student Affairs. <br>
        <br>
        This further certifies that He/She <b>was not a member of any <br>
        left leaning organization(s)</b> but rather an active Criminology <br>
        student to all the student activities of the office and the College. <br>
        <br>
        Given this <?php echo date('jS F, Y'); ?> for whatever legal <br>
        purposes this may serve to Mr. Iman.<br>
        </center>
    </div>
    <img src="{{ public_path('images/footer.png') }}" style="width: 100%; margin-top:25%;">

    
</body>
</html>