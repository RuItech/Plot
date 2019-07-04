<?php
session_start();
?>
<?php

include ('connect.php');
$sex="";
$sex = mysqli_query($db, "SELECT * FROM sex ");
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// REGISTER USER
if (isset($_POST['join'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phone)) { array_push($errors, "phone number is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM members WHERE username='$username' OR email='$email'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
  
    if ($user['email'] === $email) {
       array_push($errors, header("location:  index1.php?remark_signup=failed"));
    }
  }
  // Finally, register user if there are no errors in the form

 if (count($errors) == 0) {
    
    $password = sha1($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO `members`(`username`, `email`, `password`,`gender`, `phone`)
          VALUES('$username', '$email', '$password', '$gender', '$phone')";
   
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    //$_SESSION['title'] = $title;
    //$_SESSION['phone'] = $phone;
    //$_SESSION['password']=$password;
    $_SESSION['success'] = "You are now logged in";
     if(mysqli_query($db, $query)){
    header('location: home.php');}
 
}else{

}
}

?>


<html lang="en">

<head>
    <title>RU i-TECH</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Child Learn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- css files -->
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

    <!-- //google fonts -->

</head>

<body>

    <!-- header -->
    <header>
        <div class="top-head container">
            <div class="ml-auto text-right right-p">
                <ul>
                    <li class="mr-3">
                        <span class="fa fa-angellist"></span>For Any inquiry refer to our email</li>
                    <li>
                        <span class="fa fa-envelope-open"></span> <a href="mailto: ruitech@riarauniversity.ac.ke">ruitech@riarauniversity.ac.ke</a>

                    </li>
                    <li>
                    <h5>"OR"</h5>
                </li>
                    <li>
                        <span class="fa fa-whatsapp"></span><a href="https://chat.whatsapp.com/GF5dXgF0v60EvYsj9aFtxw" target="_blank">Whatsapp Us</a> 
                    </li>
                </ul>
                 
                
            </div>
        </div>
        <div class="container">
            <!-- nav -->
            <nav class="py-3 d-lg-flex">
                <div id="logo">
                    <h1>
                        <a href="index1.php"><img src="images/s2.png" alt=""> RU i-TECH </a>
                    </h1>
                </div>
                <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                <input type="checkbox" id="drop" />
                <ul class="menu ml-auto mt-1">
                    <li class="active"><a href="index1.php">Home</a></li>
                    <li class=""><a href="#about">About</a></li>
                    <li class=""><a href="#services">Our Services</a></li>
                    <li class=""><a href="#testi">Testimonials</a></li>
                    <li class=""><a href="#gallery">Gallery</a></li>
                    <li class=""><a href="#subscribe">Subscribe</a></li>
                </ul>
            </nav>
            <!-- //nav -->
        </div>
    </header>
    <!-- //header -->

    <!-- banner -->
    <div class="banner" id="home">
        <div class="layer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 banner-text-w3pvt">
                        <!-- banner slider-->
                        <div class="csslider infinity" id="slider1">
                            <input type="radio" name="slides" checked="checked" id="slides_1" />
                            <input type="radio" name="slides" id="slides_2" />
                            <input type="radio" name="slides" id="slides_3" />
                            <ul class="banner_slide_bg">
                                <li>
                                    <div class="container-fluid">
                                        <div class="w3ls_banner_txt">
                                            <h3 class="b-w3ltxt text-capitalize mt-md-4">WELCOME!</h3>
                                            <h4 class="b-w3ltxt text-capitalize mt-md-2">Get Inspired By Technology</h4>
                                            <p class="w3ls_pvt-title my-3">Information technology and business are becoming inextricably interwoven. I don’t think anybody can talk meaningfully about one without the talking about the other. <b>“Bill Gates”.</b></p>
                                            <a href="#about" class="btn btn-banner my-3">Read More</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="container-fluid">
                                        <div class="w3ls_banner_txt">
                                            <h3 class="b-w3ltxt text-capitalize mt-md-4">Be Innovative Today.</h3>
                                            <h4 class="b-w3ltxt text-capitalize mt-md-2">And make the better future</h4>
                                            <p class="w3ls_pvt-title my-3">  If you get up in the morning and think the future is going to be better, it is a bright day. Otherwise, its not. <b>“Elon Musk”.</b></p>
                                            <a href="#about" class="btn btn-banner my-3">Read More</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="container-fluid">
                                        <div class="w3ls_banner_txt">
                                            <h3 class="b-w3ltxt text-capitalize mt-md-4">Creativity</h3>
                                            <h4 class="b-w3ltxt text-capitalize mt-md-2">Think out of the box</h4>
                                            <p class="w3ls_pvt-title my-3"> I think frugality drives innovation just like other constraints do. One of the only ways to get out of a tight box is to invent your way out. <b>“Jeff Bezos”</b></p>
                                            <a href="#about" class="btn btn-banner my-3">Read More</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="navigation">
                                <div>
                                    <label for="slides_1"></label>
                                    <label for="slides_2"></label>
                                    <label for="slides_3"></label>
                                </div>
                            </div>
                        </div>
                        <!-- //banner slider-->
                    </div>
                    <div class="col-lg-6 col-md-8 px-lg-2 px-0">
                        <div class="banner-form-w3 ml-lg-5">
                            <div class="padding">
                               <div class="form-body">
   <div class="panel panel-body" style="background-color: #f2f2ed">

    <?php
     $remarks  =  isset($_GET['remark_signup'])  ?  $_GET['remark_signup']  :  '';
     if  ($remarks==null  and  $remarks=="")
     {
      echo  '<div class="panel panel-default panel-heading text-center" style="background-color: #3D7DDE"><b>Join Us Today</b></div>';
    }
    if  ($remarks=='failed')
    {
      echo  '<div class="panel panel-danger panel-heading text-center" style="background-color:#C55A43 "><b>Failed! Email already exist</b></div>';
    }
    else{
    }
     ?>
       
        
            <div class="innter-form">
            <form class="sa-innate-form" method="post" action="index1.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="email" placeholder="Email" required>
            <select class = "form" name="gender" >
                 <?php
                 while($res = mysqli_fetch_array($sex)) {
                  echo "<option value=".$res['sex_id'].">" .$res['gender']. "</option>";
                }
                ?>
            </select>
            <input type="text" name="phone" placeholder="Mobile" required>
            <input type="password" name="password_1" placeholder="Password" required>
            <input type="password" name="password_2" placeholder="Confirm password" required>
            <button type="submit" name="join">Join now</button>
            <a class="btn btn-warning btn-sm" href="index2.php" role="button">Login</a>
            <h5>By clicking Join now, you agree with <br>RUi-Tech's <a href="#">User Agreement, Privacy Policy, and Cookie Policy.</a></h5>
            </form>
            
        
    </div>
    </div>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //banner -->

    <!-- what we Serve -->
    <section class="banner-bottom py-5" id="about">
        <div class="container py-lg-5">
            <h2 class="heading mb-sm-5 mb-4"> ABOUT</h2>
            <div class="row bottom-grids">
                <!-- <div class="col-md-3 col-sm-6">
                    <div class="three-grids-w3pvt-1 d-flex text-right">
                        <div class="text-effect-wthree midd-text-w3ls p-3 w-100">
                            <h5 class="text-capitalize text-bl font-weight-bold">HISTORY</h5>
                            <p>Norms and Culture</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mt-sm-0 mt-4">
                    <div class="three-grids-w3pvt-2 d-flex text-right">
                        <div class="text-effect-wthree midd-text-w3ls p-3 w-100">
                            <h5 class="text-capitalize text-bl font-weight-bold">Graduation</h5>
                            <p>Education</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mt-md-0 mt-4">
                    <div class="three-grids-w3pvt-3 d-flex text-right">
                        <div class="text-effect-wthree midd-text-w3ls p-3 w-100">
                            <h5 class="text-capitalize text-bl font-weight-bold">Learning</h5>
                            <p>Education</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mt-md-0 mt-4">
                    <div class="three-grids-w3pvt-4 d-flex text-right">
                        <div class="text-effect-wthree midd-text-w3ls p-3 w-100">
                            <h5 class="text-capitalize text-bl font-weight-bold">Success</h5>
                            <p>Education</p>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-10">
                    <p class="mt-4"><b><em>OBJECTIVES</em></b></br>
                        As RU i-Tech we value innovation, teamwork, honesty, equality, leadership, respect, integrity of services and technology. We pride ourselves to working as a team to achieve success.
                        We push boundaries by letting each member freely expressing their innovative idea/ projects through monthly innovation and helping each other on venturing those ideas.
                        We provide better environment for networking and learning by inviting experts from different tech industries for a talk or bootcamp.
                        </p>
                </div>
                <div class="col-lg-1 col-sm-4 col-5 ser-img">
                    <img src="images/s1.png" class="mt-4" alt="">
                    <img src="images/s2.png" class="mt-4" alt="">
                </div>
                <div class="col-lg-1 col-sm-4 col-5 ser-img">
                    <img src="images/s3.png" class="mt-4" alt="">
                    <img src="images/s4.png" class="mt-4" alt="">
                </div>
                <div class="col-lg-5">
                    <p class="mt-4"></p>
                </div>
            </div>
        </div>
    </section>
    <!-- //what we Serve -->

    <!-- services -->
    <section class="services py-5" id="services">
        <div class="container">
            <h3 class="heading mb-5">Our Services</h3>
            <div class="row ml-sm-5">
                     <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="our-services-wrapper mb-60">
                        <div class="services-inner">
                            <div class="our-services-img">
                                <img src="images/s4.png" alt="">
                            </div>
                            <div class="our-services-text">
                                <h4>Monthly Innovation</h4>
                                <p>Among the goals of RU i-Tech is to encourage people with innovative ideas to make their ideas come to life. To accomplish that, RU i-Tech staffs are always on their toes on preparation of the venue, invitation of speakers from different industries and allowing audience to show up during the Forum.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="our-services-wrapper mb-60">
                        <div class="services-inner">
                            <div class="our-services-img">
                                <img src="images/s3.png" alt="">
                            </div>
                            <div class="our-services-text">
                                <h4>Tech-Clinic</h4>
                                <p>As a club, we provide tech clinic service per semester where we are allow both students and staff to bring their own devices for maintenance and IT consultations.</p>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="our-services-wrapper mb-60">
                        <div class="services-inner">
                            <div class="our-services-img">
                                 <img src="images/s2.png" alt="">
                            </div>
                            <div class="our-services-text">
                                <h4>Software Development </h4>
                                <p>We provide software applications which are best suite our clients.</p>
                            </div>
                        </div>
                    </div>
                </div>
               
            <!-- positioned image -->
            <div class="position-image">
                <img src="images/tech.jpg" alt="" class="img-fluid">
            </div>
            <!-- //positioned image -->
        </div>
    </section>
    <!-- //services -->

    <!-- stats section -->
  <section class="section-stats" id="stats">
        <div class="py-5">
            <div class="container py-lg-5">
                <h3 class="heading mb-sm-5 mb-4">Our statistics</h3>
                <div class="row text-center">
                <div class="col-lg-3 col-6">
                   <div class="w3layouts_stats_left w3_counter_grid">
                            <div class="stats-icon">
                                <span class="fa fa-users"></span>
                            </div>
                        <?php 
                        require_once("connect.php");
                        $sql="SELECT username FROM members";
                              if ($count=mysqli_query($db,$sql))
                             {
          // Return the number of rows in result set
                              $rowcount=mysqli_num_rows($count);

                            }
   
                              mysqli_close($db);
                       ?>
                            <p class="counter"><?php echo $rowcount ?></p>
                            <p class="para-text-w3ls">Members Enrolled</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="w3layouts_stats_left w3_counter_grid2">
                            <div class="stats-icon">
                                <span class="fa fa-wrench"></span>
                            </div>
                            <p class="counter">2</p>
                            <p class="para-text-w3ls">Projects On Developemt</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 mt-lg-0 mt-4">
                        <div class="w3layouts_stats_left w3_counter_grid1">
                            <div class="stats-icon">
                                <span class="fa fa-check-circle"></span>
                            </div>
                            <p class="counter">0</p>
                            <p class="para-text-w3ls">Completed Projects</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //stats section -->

    <!-- other services -->
    <section class="other_services py-5" id="why">
        <div class="container py-lg-5 py-3">
            <h3 class="heading mb-sm-5 mb-4">Why Choose Us </h3>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="grid">
                        <img src="images/choose1.jpg" alt="" class="img-fluid" />
                        <div class="info p-4">
                            <h4 class=""><img src="images/s1.png" class="img-fluid" alt=""> Quality Staff </h4>
                            <p class="mt-3">With groundbreaking leaders, the RU i-tech club is among the best and most vibrant clubs in Riara. The leaders who are voted for by club members after a period of one year are working tremendously to make sure they meet members
                                expectations and achieve the objectives of the club. Our constitution which is maintained and amended by board of leaders, and before passing the constitution officially, we normally let the club members review the changes
                                made by the board.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                    <div class="grid">
                        <img src="images/choose2.jpg" alt="" class="img-fluid" />
                        <div class="info p-4">
                            <h4 class=""><img src="images/s3.png" class="img-fluid" alt=""> Networking opportunities</h4>
                            <p class="mt-3">- Members will get to connect with club members, industry players and techies from other institutions. Joining Ru i-Tech will not only benefit you academically but also open up internsip and job opportunities.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                    <div class="grid">
                        <img src="images/choose3.jpg" alt="" class="img-fluid" />
                        <div class="info p-4">
                            <h4 class=""><img src="images/s5.png" class="img-fluid" alt=""> Well-Equipped Lab </h4>
                            <p class="mt-3">Ru i-tech members can access the lab in order to come up with innovative ideas. The lab has all necessary features like Cisco servers, computers, switches and toolboxes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //other services -->

    <!-- testimonials -->
    <section class="testimonials" id="testi">
        <div class="layer py-lg-5">
            <div class="container py-5">
                <h3 class="heading mb-5">What Pioneers say</h3>
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="testi-info-text">
                                <h4>Best Education i have ever seen</h4>
                                <p>
                                    <span class="fa fa-quote-left"></span> Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat.Nulla quis lorem ut libero malesuada feugiat. Donec rutrum.
                                    <span class="fa ml-2 fa-quote-right"></span>
                                </p>
                            </div>
                            <div class="testi-pos">
                                <img src="images/kara.png" alt="" class="img-fluid rounded-circle mb-3" />
                                <h4> Karagania Mwamlole </h4>
                            </div>
                        </div>
                        <div class="col-md-6 mt-md-0 mt-5">
                            <div class="testi-info-text">
                                <h4>Real world skills</h4>
                                <p>
                                    <span class="fa fa-quote-left"></span> RU i-Tech gives members a real platform where they can horn skills learnt in books and lecture rooms. The organization focuses on absolute transformation of a member from being theoretically competent to being technically and technologically astute. This is achieved by impacting the members with innovative, team work, programming, business and project management skills that are rarely taught in full measure in a class setting.
                                    <span class="fa ml-2 fa-quote-right"></span>
                                </p>
                            </div>
                            <div class="testi-pos">
                                <img src="images/njoroge.jpg" alt="" class="img-fluid rounded-circle mb-3" />
                                <h4>Godfrey Njoroge (RUi-Tech Founder)</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //testimonials -->

    <!-- Team  -->
    <section class="team pt-5" id="team">
        <div class="container py-lg-5">
            <h3 class="heading mb-sm-5 mb-4">Board Of Members</h3>
            <div class="row">
                <div class="team-grid col-md-3 col-sm-6 mb-5">
                    <img src="images/team1.jpg" class="" alt="" />
                    <div class="team-info text-center">
                        <h3 class="e">Tyson Amery</h3>
                        <span class="">Maths Teacher</span>
                    </div>
                </div>
                <div class="team-grid col-md-3 col-sm-6 mb-5">
                    <img src="images/team2.jpg" class="" alt="" />
                    <div class="team-info text-center">
                        <h3 class="">Stas Melnik</h3>
                        <span class="">English Teacher</span>
                    </div>
                </div>
                <div class="team-grid col-md-3 col-sm-6 mb-5">
                    <img src="images/team3.jpg" class="" alt="" />
                    <div class="team-info text-center">
                        <h3 class="">Lise Laurie</h3>
                        <span class="">Physics Teacher</span>
                    </div>
                </div>
                <div class="team-grid col-md-3 col-sm-6 mb-5">
                    <img src="images/team4.jpg" class="" alt="" />
                    <div class="team-info text-center">
                        <h3 class="">Effie Eleanora</h3>
                        <span class="">History Teacher</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //Team -->

    <!-- Team2  -->
    <section class="team pt-5" id="gallery">
        <div class="container py-lg-5">
            <h3 class="heading mb-sm-5 mb-4">Gallery</h3>

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <a href="gallery.php"><img src="images/style1.jpg" alt="Los Angeles" style="width:100%, height:50%"></a>
                    </div>

                    <div class="item">
                        <a href="gallery.php"><img src="images/style2.jpg" alt="Chicago" style="width:100%, height:50%"></a>
                    </div>

                    <div class="item">
                        <a href="gallery.php"><img src="images/style3.jpg" alt="New york" style="width:100%, height:50%"></a>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <a href="Gallery.php" style="margin-left: 500px" class="btn btn-banner my-3">View More</a>

            <!-- </div> -->
        </div>
    </section>
    <!-- //Team2 -->

    <!-- subscribe -->
    <section class="subscribe" id="subscribe">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 d-flex subscribe-left p-sm-5 py-4">
                    <div class="image mr-3">
                        <img src="images/mail.png" alt="" class="img-fluid">
                    </div>
                    <div class="text">
                        <h3>Subscribe To Our Newsletter</h3>
                    </div>
                </div>
                <div class="col-lg-7 subscribe-right p-sm-5 py-3">
                    <form action="#" method="post">
                        <input type="email" name="email" placeholder="Enter your email here" required="">
                        <button class="btn1"><span class="fa fa-paper-plane" aria-hidden="true"></span></button>
                    </form>
                    <p>we never share your email with anyone else</p>
                </div>
            </div>
        </div>
    </section>
    <!-- //subscribe -->

    <!-- footer -->
    <footer>
        <div class="footer-layer py-sm-5 pt-5 pb-3">
            <div class="container py-md-3">
                <div class="footer-grid_section text-center">
                    <div class="footer-title mb-3">
                        <a href="#"><img src="images/s2.png" alt=""> RU i-TECH</a>
                    </div>
                    <!-- <div class="footer-text">
                        <p>Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ipnut libero malesuada feugiat. Lorem ipsum dolor sit amet, consectetur elit.</p>
                    </div> -->
                    <ul class="social_section_1info">
                        <li class="mb-2 facebook"><a href="#"><span class="fa fa-facebook"></span></a></li>
                        <li class="mb-2 twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li class="google"><a href="#"><span class="fa fa-google-plus"></span></a></li>
                        <li class="linkedin"><a href="#"><span class="fa fa-linkedin"></span></a></li>
                        <li class="pinterest"><a href="#"><span class="fa fa-pinterest"></span></a></li>
                        <li class="vimeo"><a href="#"><span class="fa fa-vimeo"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- //footer -->

    <!-- copyright -->
    <section class="copyright">
        <div class="container py-4">
            <div class="row bottom">
                <ul class="col-lg-6 links p-0">
                    <li><a href="#why" class="">Why Choose Us</a></li>
                    <li><a href="#services" class="">Services </a></li>
                    <li><a href="#team" class="">Teachers </a></li>
                    <li><a href="#testi" class="">Testimonials </a></li>
                </ul>
                <div class="col-lg-6 copy-right p-0">
                    <p class="">© 2019 RU i-TECH. All rights reserved</p>
                </div>
            </div>
        </div>
    </section>
    <!-- //copyright -->

    <!-- move top -->
    <div class="move-top text-right">
        <a href="#home" class="move-top">
            <span class="fa fa-angle-up  mb-3" aria-hidden="true"></span>
        </a>
    </div>
    <!-- Whatsapp floating icon-->
<!-- <a href="https://wa.me/254702710739" class="float" target="_blank"> -->
    <a href="https://wa.me/254702710739" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

</body>

</html>
