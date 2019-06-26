<?php
ob_start();
session_start();
require_once("connect.php");
if (!isset($_SESSION['email'])) {
    header("Location: index2.php");
    exit;
}
//select logged in users detail
$username="";
$email="";
$gender="";
$phone="";
$course="";
$specialization="";
$interest="";
$hh =  $_SESSION['email'];
$res = $db->query("SELECT * FROM members WHERE email='$hh'" );
while($userRow = mysqli_fetch_array($res, MYSQLI_ASSOC)){

        $username = $userRow['username'];
        $email = $userRow['email'];
        $gender = $userRow['gender'];
        $phone = $userRow['phone'];
        $course=$userRow['course'];
        $specialization=$userRow['specialization'];
        $interest=$userRow['interest'];
}
?> 


<title>User Profile</title>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

     <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">RUi-Tech</a>
            </div>
            <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
           <li><a class="btn btn-warning btn-md" href="logout.php" role="button">logout</a></li>
        </ul>

           
        </nav>
    </div>
</head>

<body>


</body>
<!-- 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
-- Include the above in your HEAD tag ---------->
<br>
<br>
<div class="container emp-profile">
            <form method="post" action="profile.php">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            
                            <div class="file btn btn-lg btn-primary">
                                Change or Add Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h1>
                                        <strong><?php echo $username ?></strong>
                                    </h1>
                                    <h4>
                                        <strong><?php echo $email ?></strong>
                                    </h4>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                               <!--  <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                       <button><a href="edit.php">Edit profile</a></button>
                    </div>
                </div>
            </form>
                <div class="row">
                    
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <br>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $username ?></p><br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $email ?></p><br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $phone ?></p><br>
                                            </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $gender ?></p><br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Course:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $course ?></p><br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Specialization:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $specialization ?></p><br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Interest:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $interest ?></p>
                                            </div>
                                        </div>
                                       
                            </div>
                           
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>