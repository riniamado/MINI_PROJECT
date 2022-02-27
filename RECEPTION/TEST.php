<?php
include '../connection.php';
ob_start();
session_start();
if(isset($_SESSION['rec']))
{
    $sel_stf=mysql_query("select * from staff_data where em='".$_SESSION['rec']."'");
    $r_stf=mysql_fetch_row($sel_stf);
    $h_id=$r_stf[1];
    $sel_hos=mysql_query("select * from org_data,abt_hospital where abt_hospital.h_id=org_data.unme and org_data.unme='$h_id'");
    $r_hos=mysql_fetch_row($sel_hos);
}
else
{
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from jollythemes.com/html/jollymedic/index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Nov 2016 11:13:49 GMT -->
<head>
  
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 

  <title>Medical E CARD</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!-- Bootstrap Styles -->
  <link href="../web_style/css/bootstrap.css" rel="stylesheet">
  <!-- Awesome Icons -->
  <link rel="stylesheet" href="../web_style/css/font-awesome.css">
  <!-- Carousel -->
  <link href="../web_style/css/owl-carousel.css" rel="stylesheet">
  <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
  <link rel="stylesheet" type="text/css" href="../web_style/rs-plugin/css/settings.css" media="screen" />
  <!-- Styles -->
  <link href="../web_style/style.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,900,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic,900' rel='stylesheet' type='text/css'>
  
  <!-- Support for HTML5 -->
  <!--[if lt IE 9]>
    <script src="../web_style/js/html5shiv.js"></script>
  <![endif]-->

  <!-- Enable media queries on older bgeneral_rowsers -->
  <!--[if lt IE 9]>
    <script src="../web_style/js/respond.min.js"></script>  <![endif]-->

</head>
<body>

<div class="animationload">
<div class="loader">Loading...</div>
</div>

    <div class="topbar">
    	<div class="container">
        	<div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="callout">
                        <span class="topbar-email"><i class="fa fa-globe"></i> <a href="index.php">Medical E CARD :: A Govt. Project</a></span>
                        <span class="topbar-phone"><i class="fa fa-graduation-cap"></i> Done as Academic Project</span>
                    </div><!-- end callout -->
                </div><!-- end col -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="topbar_social pull-right">Welcome <?php echo $r_stf[2] ?></div><!-- end social icons -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end topbar -->
    
	<header class="header">
		<div class="container">
			<nav class="navbar yamm navbar-default">
				<div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                                    <a href="index.php" class="navbar-brand"><img src="../hospital/logo/<?php echo $r_hos[15] ?>" alt="<?php echo $r_hos[1] ?>" class="img img-responsive" style="height: 70px;"></a>
        		</div><!-- end navbar-header -->
                
				<div id="navbar-collapse-1" class="navbar-collapse collapse navbar-right">
					<ul class="nav navbar-nav">
                                            <li class="active"><a href="index.php">Home</a></li>
                                            <li><a href="patient.php">New Patient</a></li>
                                            <li><a href="doctors.php">Doctors</a></li>
                                            <li><a href="../logout.php">Logout</a></li>
                        </ul><!-- end navbar-nav -->
				</div><!-- #navbar-collapse-1 -->
			</nav><!-- end navbar yamm navbar-default -->
		</div><!-- end container -->
    </header><!-- end header -->
	<div class="shadow"></div>

   <div class="slider-wrapper">
        <div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>
					<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <img src="../web_style/demos/sliderbg_01.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <div class="tp-caption big_title_slider customin customout start"
                            data-x="center" data-hoffset="210"
                            data-y="170"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1000"
                            data-start="500"
                            data-easing="Back.easeInOut"
                            data-endspeed="300">Medical<span>E</span><br>
							CARD
                        </div>
                        
                        <div class="tp-caption small_title customin customout start"
                            data-x="center" data-hoffset="204"
                            data-y="290"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1300"
                            data-start="800"
                            data-easing="Back.easeInOut"
                            data-endspeed="300">Jollymedic is a prefect template for medical and health related projects or<br>
							 businesses. Easy to customizable and very easy to use!<br>
							 We Provide a Lifetime free update! for our template...
                        </div>
                        
                        <div class="tp-caption small_title customin customout start"
                            data-x="center" data-hoffset="12"
                            data-y="390"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1600"
                            data-start="1100"
                            data-easing="Back.easeInOut"
                            data-endspeed="300"><a href="../web_style/#" class="btn btn-dark btn-lg">Know More</a>
                        </div>
                        
                        <div class="tp-caption small_title customin customout start"
                            data-x="center" data-hoffset="180"
                            data-y="390"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1600"
                            data-start="1400"
                            data-easing="Back.easeInOut"
                            data-endspeed="300"><a href="../web_style/#" class="btn btn-primary btn-lg">Make an Appoinment</a>
                        </div>
                        
                        <div class="tp-caption customin customout"
                            data-x="left" data-hoffset="60"
                            data-y="bottom" data-voffset="70"
                            data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="800"
                            data-start="700"
                            data-easing="Power4.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            style="z-index: 3"><img src="../web_style/demos/slider_man_01.png" alt="">
                        </div>
                    </li>
					<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <img src="../web_style/demos/sliderbg_02.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <div class="tp-caption big_title_slider customin customout start"
                            data-x="center" data-hoffset="240"
                            data-y="170"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1000"
                            data-start="500"
                            data-easing="Back.easeInOut"
                            data-endspeed="300">WELCOME TO JOLLY<span>MEDIC</span><br>
							EMERGENCY CARE
                        </div>
                        
                        <div class="tp-caption small_title customin customout start"
                            data-x="left" data-hoffset="485"
                            data-y="290"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1300"
                            data-start="800"
                            data-easing="Back.easeInOut"
                            data-endspeed="300"><img src="../web_style/images/slider_icon.png" alt=""> World class health care delivered with experience, expertise and empathy.
                        </div>

                        <div class="tp-caption small_title customin customout start"
                            data-x="left" data-hoffset="485"
                            data-y="330" 
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1300"
                            data-start="900"
                            data-easing="Back.easeInOut"
                            data-endspeed="300"><img src="../web_style/images/slider_icon.png" alt=""> Jollymedic vision for the next phase of development is to 'Touch a Billion Lives'.
                        </div>

                        <div class="tp-caption small_title customin customout start"
                            data-x="left" data-hoffset="485"
                            data-y="370"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1300"
                            data-start="1000"
                            data-easing="Back.easeInOut"
                            data-endspeed="300"><img src="../web_style/images/slider_icon.png" alt=""> In the 30 years since, it has scripted one of the most magnificent stories of success 
                        </div>
                          
                        <div class="tp-caption small_title customin customout start"
                            data-x="center" data-hoffset="-40"
                            data-y="430"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1600"
                            data-start="1100"
                            data-easing="Back.easeInOut"
                            data-endspeed="300"><a href="../web_style/#" class="btn btn-dark btn-lg">Know More</a>
                        </div>
                        
                        <div class="tp-caption small_title customin customout start"
                            data-x="center" data-hoffset="135"
                            data-y="430"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1600"
                            data-start="1400"
                            data-easing="Back.easeInOut"
                            data-endspeed="300"><a href="../web_style/#" class="btn btn-primary btn-lg">Make an Appoinment</a>
                        </div>
                    </li>
					<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <img src="../web_style/demos/sliderbg_01.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <div class="tp-caption big_title_slider customin customout start"
                            data-x="center" data-hoffset="200"
                            data-y="170"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1000"
                            data-start="500"
                            data-easing="Back.easeInOut"
                            data-endspeed="300">JOLLY<span>MEDIC</span><br>
							CARE YOUR HEALTH
                        </div>
                        
                        <div class="tp-caption small_title customin customout start"
                            data-x="center" data-hoffset="204"
                            data-y="290"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1300"
                            data-start="800"
                            data-easing="Back.easeInOut"
                            data-endspeed="300">Jollymedic is a prefect template for medical and health related projects or<br>
							 businesses. Easy to customizable and very easy to use!<br>
							 We Provide a Lifetime free update! for our template...
                        </div>
                        
                        <div class="tp-caption small_title customin customout start"
                            data-x="center" data-hoffset="12"
                            data-y="390"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1600"
                            data-start="1100"
                            data-easing="Back.easeInOut"
                            data-endspeed="300"><a href="../web_style/#" class="btn btn-dark btn-lg">Know More</a>
                        </div>
                        
                        <div class="tp-caption small_title customin customout start"
                            data-x="center" data-hoffset="180"
                            data-y="390"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="1600"
                            data-start="1400"
                            data-easing="Back.easeInOut"
                            data-endspeed="300"><a href="../web_style/#" class="btn btn-primary btn-lg">Make an Appoinment</a>
                        </div>
                        
                        <div class="tp-caption customin customout"
                            data-x="left" data-hoffset="60"
                            data-y="bottom" data-voffset="70"
                            data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="800"
                            data-start="700"
                            data-easing="Power4.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            style="z-index: 3"><img src="../web_style/demos/slider_woman_01.png" alt="">
                        </div>
                    </li>
                 </ul>
			</div>
        </div>
	</div><!-- end slider-wrapper -->
        
	<div class="white-wrapper nopadding">
    	<div class="container">
        	<div class="general-row">
                <div class="custom-services">
                    <div class="col-lg-12 col-md-12"><br />
                        <h3><?php echo $r_hos[1] ?></h3>
                        <?php
                        echo "<div><img src='../hospital/pic/$r_hos[16]' width='300px;' class='img img-thumbnail' style='float:left; margin:5px;' /><p style='text-align:justify'>$r_hos[17]</p></div>";
                        ?>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 first">
						<div class="ch-item">	
							<div class="ch-info-wrap">
								<div class="ch-info">
									<div class="ch-info-front">
                                    	<i class="fa fa-user-md fa-4x"></i>
                                        <h3>Medical Treatment</h3>
                                    </div>
									<div class="ch-info-back">
                                    	<i class="fa fa-user-md fa-4x"></i>
                                        <h3>Medical Treatment</h3>
                                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Nulla nulla diam, Etiam urna scing elit..</p>
                                        <a class="readmore" href="../web_style/#" title="">Read More</a>
                                    </div>
								</div><!-- end ch-info -->
							</div><!-- end ch-info-wrap -->
						</div><!-- end ch-item -->
                    </div><!-- end col-sm-3 -->

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="ch-item">	
							<div class="ch-info-wrap">
								<div class="ch-info">
									<div class="ch-info-front">
                                    	<i class="fa fa-medkit fa-4x"></i>
                                        <h3>HEALTHCARE SOLUTIONS</h3>
                                    </div>
									<div class="ch-info-back">
                                    	<i class="fa fa-medkit fa-4x"></i>
                                        <h3>HEALTHCARE SOLUTIONS</h3>
                                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Nulla nulla diam, Etiam urna scing elit..</p>
                                        <a class="readmore" href="../web_style/#" title="">Read More</a>
									</div>
								</div><!-- end ch-info -->
							</div><!-- end ch-info-wrap -->
						</div><!-- end ch-item -->
                    </div><!-- end col-sm-3 -->
                    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="ch-item">	
							<div class="ch-info-wrap">
								<div class="ch-info">
									<div class="ch-info-front">
                                    	<i class="fa fa-hospital-o fa-4x"></i>
                                        <h3>ADVANCED TECHNOLOGY</h3>
                                    </div>
									<div class="ch-info-back">
                                    	<i class="fa fa-hospital-o fa-4x"></i>
                                        <h3>ADVANCED TECHNOLOGY</h3>
                                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Nulla nulla diam, Etiam urna scing elit..</p>
                                        <a class="readmore" href="../web_style/#" title="">Read More</a>
                                    </div>
								</div><!-- end ch-info -->
							</div><!-- end ch-info-wrap -->
						</div><!-- end ch-item -->
                    </div><!-- end col-sm-3 -->
                    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 last">
						<div class="ch-item last">	
							<div class="ch-info-wrap">
								<div class="ch-info">
									<div class="ch-info-front">
                                    	<i class="fa fa-ambulance fa-4x"></i>
                                        <h3>Emergency Help</h3>
                                    </div>
									<div class="ch-info-back">
                                    	<i class="fa fa-ambulance fa-4x"></i>
                                        <h3>Emergency Help</h3>
                                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Nulla nulla diam, Etiam urna scing elit..</p>
                                        <a class="readmore" href="../web_style/#" title="">Read More</a>
                                    </div>
								</div><!-- end ch-info -->
							</div><!-- end ch-info-wrap -->
						</div><!-- end ch-item -->
                    </div><!-- end col-sm-3 -->
                </div><!-- end custom-services -->
                
                <div class="clearfix"></div>
                
				<div class="calloutbox">
					<div class="col-lg-10">
                        <h2>If you need a doctor ? Make an appoinment now!</h2>
                        <p>Accusantium quam, ultricies eget tempor id, aliquam eget nibh et. Maecen aliquam, risus at semper.</p>
                    </div>
                    <div class="col-lg-2">
                        <a class="btn pull-right btn-dark btn-lg margin-top" href="../web_style/#">Make an Appoinment</a>
                    </div>
                </div><!-- end messagebox -->

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end white-wrapper -->
    
	<div class="grey-wrapper">
    	<div class="container">
        	<div class="general_row">
            	<div class="big-title clearfix">
                	<h3>Departments</h3>
                </div><!-- end big title -->	
                
				<div class="custom_tab_2 row">
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-stacked" id="another_tab">
                            <li class="active"><a href="../web_style/#tabbed_01">Pediatric Clinic</a></li>
                            <li><a href="../web_style/#tabbed_02">Laryngological Clinic</a></li>
                            <li><a href="../web_style/#tabbed_03">Ophthalmology Clinic</a></li>
                            <li><a href="../web_style/#tabbed_04">Dental Clinic</a></li>
                            <li><a href="../web_style/#tabbed_05">Cardiac Clinic</a></li>
                            <li><a href="../web_style/#tabbed_06">Gynaecological Clinic</a></li>
                        </ul>
                    </div>
                    
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabbed_01">
                            	<img src="../web_style/demos/tab_01.png" alt="" class="img-responsive alignleft">
                                <p>Integer egestas, orci id condimentum eleifend, nibh nisi pulvinar eros, vitae ornare massa neque ut orci. Nam aliquet lectus sed odio eleifend, at iaculis dolor egestas. Nunc elementum pellentesque augue sodales porta. Etiam aliquet rutrum turpis, feugiat sodales ipsum consectetur nec. </p>

								<p>Morbi imperdiet lacus nec ante blandit, sit amet fermentum magna faucibus. Nunc nec libero id urna vulputate venenatis. Aenean vulputate odio felis, in rhoncus sapien auctor nec. Donec non posuere sem. Ut quis egestas libero, mattis gravida nibh. Phasellus a nisi ac mi luctus tincidunt et non est. Proin ac orci rhoncus arcu bibendum molestie vel et metus. Aenean iaculis purus et velit iaculis, nec convallis ipsum ornare. Integer a orci enim. Aenean vulputate odio felis, in rhoncus sapien auctor nec. Donec non posuere sem. Ut quis egestas libero, mattis gravida nibh. Phasellus a nisi ac mi luctus tincidunt et non est. Proin ac orci rhoncus arcu bibendum molestie vel et metus.</p>
                            </div>
                            <div class="tab-pane" id="tabbed_02">
                            	<img src="../web_style/demos/tab_01.png" alt="" class="img-responsive alignright">
                                <p>Integer egestas, orci id condimentum eleifend, nibh nisi pulvinar eros, vitae ornare massa neque ut orci. Nam aliquet lectus sed odio eleifend, at iaculis dolor egestas. Nunc elementum pellentesque augue sodales porta. Etiam aliquet rutrum turpis, feugiat sodales ipsum consectetur nec. </p>

								<p>Morbi imperdiet lacus nec ante blandit, sit amet fermentum magna faucibus. Nunc nec libero id urna vulputate venenatis. Aenean vulputate odio felis, in rhoncus sapien auctor nec. Donec non posuere sem. Ut quis egestas libero, mattis gravida nibh. Phasellus a nisi ac mi luctus tincidunt et non est. Proin ac orci rhoncus arcu bibendum molestie vel et metus. Aenean iaculis purus et velit iaculis, nec convallis ipsum ornare. Integer a orci enim. Aenean vulputate odio felis, in rhoncus sapien auctor nec. Donec non posuere sem. Ut quis egestas libero, mattis gravida nibh. Phasellus a nisi ac mi luctus tincidunt et non est. Proin ac orci rhoncus arcu bibendum molestie vel et metus.</p>
                            </div>
                            <div class="tab-pane" id="tabbed_03">
                                <p>Integer egestas, orci id condimentum eleifend, nibh nisi pulvinar eros, vitae ornare massa neque ut orci. Nam aliquet lectus sed odio eleifend, at iaculis dolor egestas. Nunc elementum pellentesque augue sodales porta. Etiam aliquet rutrum turpis, feugiat sodales ipsum consectetur nec. </p>
                                
                                <p>Integer egestas, orci id condimentum eleifend, nibh nisi pulvinar eros, vitae ornare massa neque ut orci. Nam aliquet lectus sed odio eleifend, at iaculis dolor egestas. Nunc elementum pellentesque augue sodales porta. Etiam aliquet rutrum turpis, feugiat sodales ipsum consectetur nec. </p>

								<p>Morbi imperdiet lacus nec ante blandit, sit amet fermentum magna faucibus. Nunc nec libero id urna vulputate venenatis. Aenean vulputate odio felis, in rhoncus sapien auctor nec. Donec non posuere sem. Ut quis egestas libero, mattis gravida nibh. Phasellus a nisi ac mi luctus tincidunt et non est. Proin ac orci rhoncus arcu bibendum molestie vel et metus. Aenean iaculis purus et velit iaculis, nec convallis ipsum ornare. Integer a orci enim. Aenean vulputate odio felis, in rhoncus sapien auctor nec. Donec non posuere sem. Ut quis egestas libero, mattis gravida nibh. Phasellus a nisi ac mi luctus tincidunt et non est. Proin ac orci rhoncus arcu bibendum molestie vel et metus.</p>
                            </div>
                            <div class="tab-pane" id="tabbed_04">
                                <p>Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero </p>
                                <p>Integer egestas, orci id condimentum eleifend, nibh nisi pulvinar eros, vitae ornare massa neque ut orci. Nam aliquet lectus sed odio eleifend, at iaculis dolor egestas. Nunc elementum pellentesque augue sodales porta. Etiam aliquet rutrum turpis, feugiat sodales ipsum consectetur nec. </p>
                            </div>
                            <div class="tab-pane" id="tabbed_05">
                                <p>Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero.</p>
                                <p>Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero </p>
                            </div>
                            <div class="tab-pane" id="tabbed_06">
                                <p>Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero </p>
                                <p>Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero </p>
                                <p>Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero </p>
                            </div>
                        </div>
                    </div>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end grey-wrapper -->
    
	<div class="white-wrapper">
    	<div class="container">
        	<div class="row">
           		<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="big-title clearfix">
                        <h3>OUR SPECIALISTS</h3>
                    </div><!-- end big title -->
                    
					<div class="team_widget">
                    	<ul>
                        	<li>
                            	<img src="../web_style/demos/team_01.png" class="img-responsive img-circle alignleft" alt=""> 
                              	<h3><span>Jenny Deo</span></h3>
                                <h4>Gynaecological Clinic</h4>
                                <p>Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero. </p>
                                <div class="social-icons">
                                    <span class="facebook"><a data-toggle="tooltip" data-placement="bottom" title="Facebook" href="../web_style/#"><i class="fa fa-facebook"></i></a></span>
                                    <span class="google-plus"><a data-toggle="tooltip" data-placement="bottom" title="Google Plus" href="../web_style/#"><i class="fa fa-google-plus"></i></a></span>
                                    <span class="twitter"><a data-toggle="tooltip" data-placement="bottom" title="Twitter" href="../web_style/#"><i class="fa fa-twitter"></i></a></span>
                                    <span class="linkedin"><a data-toggle="tooltip" data-placement="bottom" title="Linkedin" href="../web_style/#"><i class="fa fa-linkedin"></i></a></span>
                                </div><!-- end social icons -->
                            </li>
                        	<li>
                            	<img src="../web_style/demos/team_02.png" class="img-responsive img-circle alignleft" alt=""> 
								<h3><span>John Collins</span></h3>
								<h4>Dental Clinic</h4>
                                <p>Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. augue velit cursus nunc, quis gravida magna mi a libero. </p>
                                <div class="social-icons">
                                    <span class="facebook"><a data-toggle="tooltip" data-placement="bottom" title="Facebook" href="../web_style/#"><i class="fa fa-facebook"></i></a></span>
                                    <span class="google-plus"><a data-toggle="tooltip" data-placement="bottom" title="Google Plus" href="../web_style/#"><i class="fa fa-google-plus"></i></a></span>
                                    <span class="twitter"><a data-toggle="tooltip" data-placement="bottom" title="Twitter" href="../web_style/#"><i class="fa fa-twitter"></i></a></span>
                                    <span class="linkedin"><a data-toggle="tooltip" data-placement="bottom" title="Linkedin" href="../web_style/#"><i class="fa fa-linkedin"></i></a></span>
                                </div><!-- end social icons -->
                            </li>                  
                    	</ul>
                    </div><!-- end team_widget -->   
                </div><!-- end col-lg-6 -->
           		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="big-title clearfix">
                        <h3>MAKE AN APPOINMENT</h3>
                    </div><!-- end big title -->
                    
                    <div class="custom_tabbed">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="custom_tab">
                            <li class="active"><a href="../web_style/#online_form" data-toggle="tab">Online Form</a></li>
                            <li><a href="../web_style/#ask_question" data-toggle="tab">Ask Question</a></li>
                        </ul>
                                                
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="online_form">
								<form class="clearfix" role="form" id="online_form_builder">
                                    <select class="form-control" id="select_department">
                                        <option>Select Department</option>
                                        <option>Health Care</option>
                                        <option>Eye Care</option>
                                        <option>Dental Care</option>
                                    </select>
                                    <input type="text" class="form-control" id="full_name" placeholder="Full Name (required)">
                                    <input type="text" class="form-control" id="phone_number" placeholder="Phone Number (required)">
                                    <input type="text" class="form-control" id="email" placeholder="Email Address (required)">
                                    <div class="form-group">
                                        <div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                            <input class="form-control" placeholder="Date of Appointment" type="text" value="" readonly>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />
                                    </div>
                                    <button class="btn pull-right btn-dark">Book Now</button>
								</form>
                                <div class="clearfix"></div>
                                <h3 class="margin-top">For Emergency - <span>1-900-643-4300</span></h3>
                            </div><!-- end online_form -->
                            <div class="tab-pane fade" id="ask_question">
								<form class="clearfix" role="form" id="ask_question_builder">
                                    <input type="text" class="form-control" id="full_name_01" placeholder="Full Name (required)">
                                    <input type="text" class="form-control" id="phone_number_01" placeholder="Phone Number (required)">
                                    <input type="text" class="form-control" id="email_01" placeholder="Email Address (required)">
                                    <textarea class="form-control" name="comments" id="comments_textarea" rows="7" placeholder="Enter your question here.."></textarea>
									<button class="btn pull-right btn-dark">Ask Now</button>
								</form>
                            </div><!-- end ask_question -->
                        </div><!-- end tab-content -->
                    </div><!-- end custom tabbed -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end white-wrapper -->
    
	<div class="grey-wrapper">
    	<div class="container">
        	<div class="general_row">
            	<div class="big-title clearfix">
                	<h3>Latest HEALTH TIPS & News</h3>
                </div><!-- end big title -->	
           	
            	<div id="owl-blog" class="owl-carousel">
                
                    <div class="item">
                        <div class="blog-carousel">
                            <div class="entry">
                                <img src="../web_style/demos/blog_01.png" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="buttons">
                                        <a class="st" rel="bookmark" href="../web_style/blog-single.html"><i class="fa fa-link"></i></a>
                                        <a class="st" rel="bookmark" href="../web_style/#"><i class="fa fa-eye"></i></a>
                                    </div><!-- end buttons -->
                                </div><!-- end magnifier -->
                            </div><!-- end entry -->
                            <div class="blog-carousel-header">
                                <h3><a title="" href="../web_style/blog-single.html">Patient and Visitor Guide</a></h3>
                                <div class="blog-carousel-meta">
                                    <span><i class="fa fa-calendar"></i> April 01, 2014</span>
                                    <span><i class="fa fa-comment"></i> <a href="../web_style/#">03 Comments</a></span>
                                    <span><i class="fa fa-eye"></i> <a href="../web_style/#">84 Views</a></span>
                                </div><!-- end blog-carousel-meta -->
                            </div><!-- end blog-carousel-header -->
                            <div class="blog-carousel-desc">
                                <p>Class aptent torquent per conubia nostra, per inceptos himenaeos. Aenean vel faucibus nunc, et venenatis magna. In hac habitasse platea dictumst. </p>
                            </div><!-- end blog-carousel-desc -->
                            <a href="../web_style/blog-single.html" class="btn btn-dark btn-sm">Read More</a>
                        </div><!-- end blog-carousel -->
                    </div><!-- end col -->
                    
                    <div class="item">
                        <div class="blog-carousel">
                            <div class="entry">
                                <img src="../web_style/demos/blog_02.png" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="buttons">
                                        <a class="st" rel="bookmark" href="../web_style/blog-single.html"><i class="fa fa-link"></i></a>
                                        <a class="st" rel="bookmark" href="../web_style/#"><i class="fa fa-eye"></i></a>
                                    </div><!-- end buttons -->
                                </div><!-- end magnifier -->
                            </div><!-- end entry -->
                            <div class="blog-carousel-header">
                                <h3><a title="" href="../web_style/blog-single.html">Nutritional Personal Consultation</a></h3>
                                <div class="blog-carousel-meta">
                                    <span><i class="fa fa-calendar"></i> April 01, 2014</span>
                                    <span><i class="fa fa-comment"></i> <a href="../web_style/#">03 Comments</a></span>
                                    <span><i class="fa fa-eye"></i> <a href="../web_style/#">84 Views</a></span>
                                </div><!-- end blog-carousel-meta -->
                            </div><!-- end blog-carousel-header -->
                            <div class="blog-carousel-desc">
                                <p>Class aptent torquent per conubia nostra, per inceptos himenaeos. Aenean vel faucibus nunc, et venenatis magna. In hac habitasse platea dictumst. </p>
                            </div><!-- end blog-carousel-desc -->
                            <a href="../web_style/blog-single.html" class="btn btn-dark btn-sm">Read More</a>
                        </div><!-- end blog-carousel -->
                    </div><!-- end col -->
                    
                    <div class="item">
                        <div class="blog-carousel">
                            <div class="entry">
                                <img src="../web_style/demos/blog_03.png" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="buttons">
                                        <a class="st" rel="bookmark" href="../web_style/blog-single.html"><i class="fa fa-link"></i></a>
                                        <a class="st" rel="bookmark" href="../web_style/#"><i class="fa fa-eye"></i></a>
                                    </div><!-- end buttons -->
                                </div><!-- end magnifier -->
                            </div><!-- end entry -->
                            <div class="blog-carousel-header">
                                <h3><a title="" href="../web_style/blog-single.html">Center for Medical Technology </a></h3>
                                <div class="blog-carousel-meta">
                                    <span><i class="fa fa-calendar"></i> April 01, 2014</span>
                                    <span><i class="fa fa-comment"></i> <a href="../web_style/#">03 Comments</a></span>
                                    <span><i class="fa fa-eye"></i> <a href="../web_style/#">84 Views</a></span>
                                </div><!-- end blog-carousel-meta -->
                            </div><!-- end blog-carousel-header -->
                            <div class="blog-carousel-desc">
                                <p>Class aptent torquent per conubia nostra, per inceptos himenaeos. Aenean vel faucibus nunc, et venenatis magna. In hac habitasse platea dictumst. </p>
                            </div><!-- end blog-carousel-desc -->
                            <a href="../web_style/blog-single.html" class="btn btn-dark btn-sm">Read More</a>
                        </div><!-- end blog-carousel -->
                    </div><!-- end col -->
                    <div class="item">
                        <div class="blog-carousel">
                            <div class="entry">
                                <img src="../web_style/demos/blog_01.png" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="buttons">
                                        <a class="st" rel="bookmark" href="../web_style/blog-single.html"><i class="fa fa-link"></i></a>
                                        <a class="st" rel="bookmark" href="../web_style/#"><i class="fa fa-eye"></i></a>
                                    </div><!-- end buttons -->
                                </div><!-- end magnifier -->
                            </div><!-- end entry -->
                            <div class="blog-carousel-header">
                                <h3><a title="" href="../web_style/blog-single.html">Patient and Visitor Guide</a></h3>
                                <div class="blog-carousel-meta">
                                    <span><i class="fa fa-calendar"></i> April 01, 2014</span>
                                    <span><i class="fa fa-comment"></i> <a href="../web_style/#">03 Comments</a></span>
                                    <span><i class="fa fa-eye"></i> <a href="../web_style/#">84 Views</a></span>
                                </div><!-- end blog-carousel-meta -->
                            </div><!-- end blog-carousel-header -->
                            <div class="blog-carousel-desc">
                                <p>Class aptent torquent per conubia nostra, per inceptos himenaeos. Aenean vel faucibus nunc, et venenatis magna. In hac habitasse platea dictumst. </p>
                            </div><!-- end blog-carousel-desc -->
                            <a href="../web_style/blog-single.html" class="btn btn-dark btn-sm">Read More</a>
                        </div><!-- end blog-carousel -->
                    </div><!-- end col -->
                    
                    <div class="item">
                        <div class="blog-carousel">
                            <div class="entry">
                                <img src="../web_style/demos/blog_02.png" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="buttons">
                                        <a class="st" rel="bookmark" href="../web_style/blog-single.html"><i class="fa fa-link"></i></a>
                                        <a class="st" rel="bookmark" href="../web_style/#"><i class="fa fa-eye"></i></a>
                                    </div><!-- end buttons -->
                                </div><!-- end magnifier -->
                            </div><!-- end entry -->
                            <div class="blog-carousel-header">
                                <h3><a title="" href="../web_style/blog-single.html">Nutritional Personal Consultation</a></h3>
                                <div class="blog-carousel-meta">
                                    <span><i class="fa fa-calendar"></i> April 01, 2014</span>
                                    <span><i class="fa fa-comment"></i> <a href="../web_style/#">03 Comments</a></span>
                                    <span><i class="fa fa-eye"></i> <a href="../web_style/#">84 Views</a></span>
                                </div><!-- end blog-carousel-meta -->
                            </div><!-- end blog-carousel-header -->
                            <div class="blog-carousel-desc">
                                <p>Class aptent torquent per conubia nostra, per inceptos himenaeos. Aenean vel faucibus nunc, et venenatis magna. In hac habitasse platea dictumst. </p>
                            </div><!-- end blog-carousel-desc -->
                            <a href="../web_style/blog-single.html" class="btn btn-dark btn-sm">Read More</a>
                        </div><!-- end blog-carousel -->
                    </div><!-- end col -->
                    
                    <div class="item">
                        <div class="blog-carousel">
                            <div class="entry">
                                <img src="../web_style/demos/blog_03.png" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="buttons">
                                        <a class="st" rel="bookmark" href="../web_style/blog-single.html"><i class="fa fa-link"></i></a>
                                        <a class="st" rel="bookmark" href="../web_style/#"><i class="fa fa-eye"></i></a>
                                    </div><!-- end buttons -->
                                </div><!-- end magnifier -->
                            </div><!-- end entry -->
                            <div class="blog-carousel-header">
                                <h3><a title="" href="../web_style/blog-single.html">Center for Medical Technology </a></h3>
                                <div class="blog-carousel-meta">
                                    <span><i class="fa fa-calendar"></i> April 01, 2014</span>
                                    <span><i class="fa fa-comment"></i> <a href="../web_style/#">03 Comments</a></span>
                                    <span><i class="fa fa-eye"></i> <a href="../web_style/#">84 Views</a></span>
                                </div><!-- end blog-carousel-meta -->
                            </div><!-- end blog-carousel-header -->
                            <div class="blog-carousel-desc">
                                <p>Class aptent torquent per conubia nostra, per inceptos himenaeos. Aenean vel faucibus nunc, et venenatis magna. In hac habitasse platea dictumst. </p>
                            </div><!-- end blog-carousel-desc -->
                            <a href="../web_style/blog-single.html" class="btn btn-dark btn-sm">Read More</a>
                        </div><!-- end blog-carousel -->
                    </div><!-- end col -->

                </div><!-- end row -->
            </div><!-- end general row -->
        </div><!-- end container -->
    </div><!-- end grey-wrapper -->
    
	<div class="white-wrapper">
    	<div class="container">
        	<div class="row">
           		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                	<div class="client_logo">
                    	<a href="../web_style/#" title="">
                            <img src="../web_style/demos/client_logo_01.png" class="img-responsive" alt="">
                        </a>
                    </div><!-- end client_logo -->
                </div><!-- end col-lg-3 -->
           		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                	<div class="client_logo">
                    	<a href="../web_style/#" title="">
                            <img src="../web_style/demos/client_logo_02.png" class="img-responsive" alt="">
                        </a>
                    </div><!-- end client_logo -->  
                </div><!-- end col-lg-3 -->
           		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                	<div class="client_logo">
                    	<a href="../web_style/#" title="">
                            <img src="../web_style/demos/client_logo_03.png" class="img-responsive" alt="">
                        </a>
					</div><!-- end client_logo -->
                </div><!-- end col-lg-3 -->
           		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                	<div class="client_logo">
                    	<a href="../web_style/#" title="">
                            <img src="../web_style/demos/client_logo_04.png" class="img-responsive" alt="">
                        </a>
                    </div><!-- end client_logo -->
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end white-wrapper -->
    
    <footer class="footer">
    	<div class="container">
        	<div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                	<div class="widget">
                    	<img src="../web_style/images/flogo.png" alt="JollyMedic" class="flogo img-responsive">
						<p>Quisque et sollicitudin erat. Aenean nulla orci, posuere at molestie et, sagittis a magna. Pellentesque ultricies feugiat arcu, a sagittis dolor adipiscing.</p>
						<p>Cras magna augue, lacinia id purus eu, dictum mattis nunc. Nullam volutpat, urna at pretium pharetra, lectus lacus posuere orci, a varius leo magna a erat. </p>              
                        <div class="social-icons">
                            <span class="facebook"><a data-toggle="tooltip" data-placement="bottom" title="Facebook" href="../web_style/#"><i class="fa fa-facebook"></i></a></span>
                            <span class="google-plus"><a data-toggle="tooltip" data-placement="bottom" title="Google Plus" href="../web_style/#"><i class="fa fa-google-plus"></i></a></span>
                            <span class="twitter"><a data-toggle="tooltip" data-placement="bottom" title="Twitter" href="../web_style/#"><i class="fa fa-twitter"></i></a></span>
                            <span class="linkedin"><a data-toggle="tooltip" data-placement="bottom" title="Linkedin" href="../web_style/#"><i class="fa fa-linkedin"></i></a></span>
                        </div><!-- end social icons -->
					</div><!-- end widget -->
                </div><!-- end col -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                	<div class="widget">
                        <div class="title">
                           <h3>Latest Tweets</h3>
                        </div><!-- end title -->
                        <ul class="twitter_feed">
                            <li><span></span><h3>Karen Dawson</h3> <p>Jolly Themes wishes you and your family a merry Christmas and a happy new! <a href="../web_style/#">about 2 days ago</a></p></li>
                            <li><span></span><h3>Karen Dawson</h3> <p>Jolly Themes wishes you and your family a merry Christmas and a happy new! <a href="../web_style/#">about 9 days ago</a></p></li>
                        </ul><!-- end twiteer_feed --> 
                    </div><!-- end widget -->
                </div><!-- end col -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                	<div class="widget">
                        <div class="title">
                           <h3>Health Tips</h3>
                        </div><!-- end title -->
                        <ul class="recent_posts_widget">
                            <li>
								<img src="../web_style/demos/footer_img_01.png" alt="" />
                                <h4><a href="../web_style/#">Nutritional Personal Consultation with Doctor</a></h4>
                                <span>Feburay 16, 2013</span>
                                <a class="readmore" href="../web_style/#" title="">View more</a>
                            </li>
                            <li>
                                <img src="../web_style/demos/footer_img_02.png" alt="" />
                                <h4><a href="../web_style/#">Center for Medical Technology Innovation</a></h4>
                                <span>Feburay 16, 2013</span>
                                <a class="readmore" href="../web_style/#" title="">View more</a>
                            </li>
                            <li>
                                <img src="../web_style/demos/footer_img_03.png" alt="" />
                                <h4><a href="../web_style/#">Get ore health with ...</a></h4>
                                <span>Feburay 16, 2013</span>
                                <a class="readmore" href="../web_style/#" title="">View more</a>
                            </li>
                        </ul><!-- recent posts -->  
                    </div><!-- end widget -->
                </div><!-- end col -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                	<div class="widget">
                        <div class="title">
                           <h3>Contact Info</h3>
                        </div><!-- end title -->
                        <div class="contact_widget">
                        	<ul>
                            	<li><i class="fa fa-map-marker"></i> 121 King Street, Melbourne Victoria United States of America, CA 90017</li>
								<li><i class="fa fa-envelope-o"></i> <a href="../web_style/mailto:support@yoursite.com" title="">support@yoursite.com</a></li>
                                <li><i class="fa fa-phone"></i> Phone: (1005) 5999 4446</li>
                            </ul>
                            <div class="newsletter_form_wrapper">
                            	<h4>Subscribe to our newsletter to receive Latest health news, We don't do spam</h4>
								<form action="#" class="newsletter_form">
                                    <input type="text" class="form-control" placeholder="Enter your email address"> 
                                    <a href="../web_style/#" class="btn btn-primary pull-right">Subscribe</a>    
								</form><!-- end newsletter form -->
                            </div><!-- end newsletter_form -->
                        </div><!-- end contact_widget -->
                    </div><!-- end widget -->
                </div><!-- end col -->    
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->
    
    <div class="copyright">
    	<div class="container">
        	<div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="copyright-text">
                        <p>Copyright © 2014 - JollyMedic Designed by JollyThemes</p>
                    </div><!-- end copyright-text -->
                </div><!-- end widget -->
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="footer-menu">
                        <ul class="menu pull-right">
                            <li class="active"><a href="../web_style/#">Home</a></li>
                            <li><a href="../web_style/#">About us</a></li>
                            <li><a href="../web_style/#">Doctors</a></li>
                            <li><a href="../web_style/#">Appointments</a></li>
                            <li><a href="../web_style/#">Blog</a></li>
                            <li><a href="../web_style/#">Contact</a></li>
                        </ul>
                    </div>
                </div><!-- end large-7 --> 
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end copyrights -->
    
	<div class="dmtop">Scroll to Top</div>
    
	<!-- Main Scripts-->
	<script src="../web_style/js/jquery.js"></script>
	<script src="../web_style/js/bootstrap.min.js"></script>
    <script src="../web_style/js/bootstrap-datetimepicker.js"></script>
	<script src="../web_style/js/menu.js"></script>
	<script src="../web_style/js/retina-1.1.0.js"></script>
	<script src="../web_style/js/custom.js"></script>

	<!-- CALENDAR WIDGET  -->
	<script type="text/javascript">
		(function($) {
		  "use strict";
			$('.form_datetime').datetimepicker({
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				forceParse: 0,
				showMeridian: 1
			});
		})(jQuery);
	</script>

	<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
	<script type="text/javascript" src="../web_style/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
	<script type="text/javascript" src="../web_style/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript">
		(function($) {
		  "use strict";
			var revapi;
			jQuery(document).ready(function() {
				revapi = jQuery('.tp-banner').revolution(
				{
					delay:9000,
					startwidth:1170,
					startheight:560,
					hideThumbs:10,
					fullWidth:"on",
					forceFullWidth:"on"
				});
			});	//ready
		})(jQuery);
	</script>

	<!-- CAROUSEL WIDGET -->
	<script src="../web_style/js/owl.carousel.min.js"></script>
	<script>
		(function($) {
		  "use strict";
			// OWL Carousel
			$("#owl-blog").owlCarousel({
				items : 3,
				lazyLoad : true,
				navigation : true,
				pagination : false,
				autoPlay: false
			});
		})(jQuery);
	</script>
    
</body>

<!-- Mirrored from jollythemes.com/html/jollymedic/index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Nov 2016 11:13:49 GMT -->
</html>