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
if(isset($_POST['add_dep']))
{
    $dep=$_POST['dep'];
    if($dep==0)
    {
        header("location:doctors.php");
    }
    else
    {
        header("location:doctors.php?dep=$dep");
    }
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
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="patient.php">New Patient</a></li>
                                            <li class="active"><a href="doctors.php">Doctors</a></li>
                                            <li><a href="../logout.php">Logout</a></li>
                        </ul><!-- end navbar-nav -->
				</div><!-- #navbar-collapse-1 -->
			</nav><!-- end navbar yamm navbar-default -->
		</div><!-- end container -->
    </header><!-- end header -->
	<div class="shadow"></div>

   <div class="slider-wrapper">
        
	</div><!-- end slider-wrapper -->
        
	<div class="white-wrapper nopadding">
    	<div class="container">
        	<div class="general-row">
                <div class="custom-services">
                    <div class="col-lg-12 col-md-12">
                        <br />
                        <form method="post">
                                                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                                <tr>
                                                                    <td><select name="dep" class="form-control" required="required" style="width: 80%; float: left;">
                                                                            <option value="">Choose The Department to filter Doctor</option>
                                                                            <option value="0">All Department</option>
                                                                            <?php
                                                                            
                                                                            $sel_dep=mysql_query("select * from department_data,hos_dep where department_data.id=hos_dep.dep_id and  hos_dep.h_id='".$h_id."'");
                                                                            
                                                                            while($r_dep=mysql_fetch_row($sel_dep))
                                                                            {
                                                                                ?>
                                                                            <option value="<?php echo $r_dep[0] ?>"><?php echo $r_dep[1] ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <input type="submit" name="add_dep" value="View Doctors" class="btn btn-warning" style="width: 15%; height: 35px;" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            </form> 
                        <?php
                                                           if(isset($_GET['dep']))
                                                                            {
                                                               $sel_dep=mysql_query("select * from department_data where id='".$_GET['dep']."'");
                                                               $r_dep=mysql_fetch_row($sel_dep);
                                                               echo " <h3>Available Doctors :: $r_dep[1]</h3>";
                                                                                $sel_doc=mysql_query("select * from doc_data where h_id='".$h_id."' and dep='".$_GET['dep']."'");
                                                                            }
                                                                            else
                                                                            {
                                                                                echo " <h3>Available Doctors :: ALL DEPARTMENT</h3>";
                                                                                
                                                                                $sel_doc=mysql_query("select * from doc_data where h_id='".$h_id."' order by rand() limit 9");
                                                                            }
                                                           if(mysql_num_rows($sel_doc)>0)
                                                           {
                                                               while($r_doc=mysql_fetch_row($sel_doc))
                                                               {
                                                                   ?>
                                                            <div class="col-lg-3"><center>
                                                                    <img src="../hospital/doctor/<?php echo $r_doc[8] ?>" class="imh img-thumbnail" style="height: 200px" /><br /><strong><?php echo $r_doc[2] ?></strong><br /><?php echo $r_doc[4] ?>
                                                                </center></div>
                                                            <?php
                                                               }
                                                           }
                                                           ?>
                    </div>
                    
                
				

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end white-wrapper -->
    
	
	
    
	
    
	
    
    
    
    <div class="copyright" style="margin-top: 200px;">
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