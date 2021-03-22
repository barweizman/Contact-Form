
<?php

$error="<br>"; 
$successMessage="";

if($_POST){

    if(!$_POST["email"]){

        $error.="An email adress is required.<br>";
    }

    if(!$_POST["content"]){

        $error.="The content field is required.<br>";
    }

    if(!$_POST["subject"]){

        $error.="The subject is required.<br>";
    }

    if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
    
        $error.="The email adress is invalid.<br>";
    }

    if($error != "<br>"){

        $error = '<div class="alert alert-danger" role="alert"><strong>There were error(s) completing the form: </strong>'.$error.'</div>';
                    

    } else{

        $emailTo = "me@mydomain.com";

        $subject = $_POST['subject'];

        $content = $_POST['content'];

        $headers = "From:" .$_POST['email'];

        if(mail($emailTo,$subject,$content,$headers)){

            $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we will get back to you soon.</div>';
        }

        else{

            $error = '<div class="alert alert-danger" role="alert">Your message couldn\`t be sent, please try again later.</div>';

        }
    }
}

?>



<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>

<div class="container">

    <h1>Get in touch!</h1>

    <div id="error"><? echo $error.$successMessage; ?></div>

    <form method="post">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email adress,e.g:name@example.com">
            <small class="text-muted">We`ll never share you email with anyone else.</small>
        <div class="form-group">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" >
        </div>
        <div class="form-group">
            <label for="content">What would you like to ask us?</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
        </div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
 

<script type="text/javascript">


</script>

</body>

</html>


