<?php
include '../connection.php';
ob_start();
session_start();
if(isset($_SESSION['doc']))
{
    $sel_stf=mysql_query("select * from doc_data where em='".$_SESSION['doc']."'");
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
                    <div class="topbar_social pull-right">Welcome <?php echo $r_stf[2] ?> <a href="docprofile.php"><span class="glyphicon glyphicon-edit" title="Edit profile"></span></a></div><!-- end social icons -->
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
                                            <li><a href="patient.php">My Patient</a></li>
                                            <li><a href="appointment.php">Appointments</a></li>
                                            <li><a href="disease.php">Search Disease</a></li>
                                            <li><a href="myadmit.php">My Admitted Patient</a></li>
                                            <li><a href="fitnes.php">Fitness Certificate</a></li>
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
                            <?php
                            $sel_dep=mysql_query("select * from department_data,hos_dep where department_data.id=hos_dep.dep_id and hos_dep.h_id='$h_id'");
                            $i=0;
                            while($r_dep=mysql_fetch_row($sel_dep))
                            {
                                if($i==0)
                                {
                                    $cls="active";
                                }
                                else
                                {
                                    $cls="";
                                }
                                ?>
                              
                                <li class="<?php echo $cls ?>"><a href="#tabbed_<?php echo $i ?>"><?php echo $r_dep[1] ?></a></li>
                            <?php
                            $i++;
                            }                                    
                            ?>
                           
                        </ul>
                    </div>
                    
                    <div class="col-md-9">
                        <div class="tab-content">
                            <?php
                            $sel_dep=mysql_query("select * from department_data,hos_dep where department_data.id=hos_dep.dep_id and hos_dep.h_id='$h_id'");
                            $i=0;
                            while($r_dep=mysql_fetch_row($sel_dep))
                            {
                                if($i==0)
                                {
                                    $cls="active";
                                }
                                else
                                {
                                    $cls="";
                                }
                                ?>
                            <div class="tab-pane <?php echo $cls ?>" id="tabbed_<?php echo $i ?>">                            	
                                <p><?php echo $r_dep[2] ?></p>
                            </div>
                            <?php
                            $i++;
                            }                                    
                            ?>
                            
                        </div>
                    </div>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end grey-wrapper -->
    
	
    
	
    
	
    
    
    
    <div class="copyright">
    	<div class="container">
        	<div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="copyright-text">
                        <p>Copyright © 2016 - mEDICAL E cAED Designed by<br /> Trinity Technologies</p>
                    </div><!-- end copyright-text -->
                </div><!-- end widget -->
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="footer-menu">
                        
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