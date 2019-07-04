<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- bootstrap css -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- custom css -->
    <link href="css/css_slider.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- fontawesome css -->
    <!-- //css files -->

    <!-- google fonts -->
   <!--  <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

     <link href="css/form.css" rel="stylesheet">
     <link href="whatsapp.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div class="wrapper-main">
        <section class="section-default">
            <h1>Set Your New Password</h1>
    <div class="wrapper-main">
        
            <?php

   //          $selector = $_GET["selector"];
            // $validator = $_GET["validator"];

     if(isset($_GET['selector']) && isset($_GET['validator'])){
        $validator = trim($_GET['validator']);
        $selector = trim($_GET['selector']);


        //  if(empty($selector) || empty($validator)){
        //  echo "could not validate your request!";
        // }else{
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
            ?>

            <form action="includes/reset-password.inc.php" method="post">
                <input type="hidden" name="selector" value="<?php echo $selector  ?>">
                <input type="hidden" name="validator" value="<?php echo $validator ?>">
                <input type="Password" name="pwd" placeholder="Enter a new Password">
                <input type="Password" name="pwd-repeat" placeholder="Repeat new Password">
                <button type="submit" name = "reset-password-submit">Reset password</button>
            </form>

            <?php
        }

        }else{
            echo "could not validate your request!";
    }
        ?>
    </div>
        </section>
    </div>

</body>
</html>