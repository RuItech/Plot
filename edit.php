<?php 
  session_start(); 

  if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index2.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: index2.php");
  }
?>

<?php


// including the database connection file
include_once('connect.php');
//include('session.php');

if(isset($_POST['edit']))
{    
  
  
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone=$_POST['phone'];
  $gender=$_POST['gender'];  

   // if (count($errors) == 0) {
   //  $password = sha1($password_1);

    $result = mysqli_query($db, "UPDATE members SET username='$username',email='$email',phone='$phone', gender='$gender' WHERE email=$email" );

        //redirectig to the display page. In our case, it is index.php
    header("location: profile.php");
  }


?>

<?php 
    include_once ('connect.php');

    $user = $_SESSION['email'];

    $sql = "SELECT * FROM members WHERE email = '".$user."'";
    $result = mysqli_query($db, $sql);
 
    while($row=mysqli_fetch_array($result))
    {
        $username = $row['username'];
        $email = $row['email'];
        $phone = $row['phone'];
        $gender=$row['gender'];
       
    }

?>

<?php  
include_once('connect.php');
$sex = mysqli_query($db, "SELECT gender FROM sex");
?>
<?php
include_once('connect.php');
$course = mysqli_query($db, "SELECT course_id FROM courses");
?>

<html>
<head>    
  <title>Edit Profile</title>

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


 
  <style>
    #logo {
      height: 200%;
      width: 70%;
      margin-top: -7px;
      margin-right: -200px;
    }
  </style>




</head>

<body>
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
            <li><a class="btn btn-default btn-md" href="profile.php">Profile</a></li>
           <li><a class="btn btn-warning btn-md" href="logout.php" role="button">Logout</a></li>
        </ul>

            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>

<br>
<div class = "container">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-success">
      <div class="panel panel-heading text-center">UPDATE YOUR PROFILE</div>
      <div class="panel panel-body">
        <form action="edit.php" method="post"> 
         <div class = "form-group">
          <div class="row">
            <div class="col-md-6">

             <label>Username</label>
             <input type="text" class="form-control" name="username" value="<?php echo $username;?>"><br>

             <label>Email</label>
             <input type="text" class="form-control" name="email" value="<?php echo $email;?>"><br>

             <label>Gender</label>
             <!--<input type="text" class="form-control" name="cell" value="<?php echo $cell;?>"><br>-->
             <select class = "form-control" name="gender" >
                         <?php
                           while($res = mysqli_fetch_array($sex)) {
                          $t =  $res['gender'];

                        echo '<option value="'.$t.'">' .$res['gender']. "</option>";
                          
                            }
                          ?>
                
                       </select><br>
             <label>Course</label>
             <!--<input type="text" class="form-control" name="cell" value="<?php echo $cell;?>"><br>-->
             <select class = "form-control" name="course" >
                         <?php
                           while($res1 = mysqli_fetch_array($course)) {
                          $t1 =  $res1['course_id'];

                        echo '<option value="'.$t1.'">' .$res1['course_id']. "</option>";
                          
                            }
                          ?>
                       </select><br>
          </div>
     </div>
      <div class="row">
            <div class="col-md-6">

             <label>phone</label>
             <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
          </div>
     </div>
     <div class="form-footer">
      <input type="hidden" name="user" value=<?php echo $_SESSION['email'];?>>
      <input type="submit" class = "btn btn-info btn-lg pull-right" name="update" value="update">

    </div>

  </div>
</form> 


</div>

</div>


</body>
</html>