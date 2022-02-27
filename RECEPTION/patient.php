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
if(isset($_POST['sub']))
{
    $bar=$_POST['barcode'];
    header("location:patient.php?bar=$bar");
}
if(isset($_POST['add_pat']))
{
    $dep=$_POST['dep'];
    $doc=$_POST['doc'];
    $ob=$_POST['ob'];
    $ins_pat=  mysql_query("insert into new_patient values('','$h_id','".$_GET['bar']."','$ob','','','','','','$dep','$doc','".date('Y-m-d')."','','".date('Y-m')."','0')");
    if($ins_pat>0)
    {
        header("location:patient.php");
    }
}
if(isset($_GET['emargency']))
{
    $sel_fm=mysql_query("select * from cit_data where bar_code='".$_GET['bar']."'");
    $r_fm=mysql_fetch_row($sel_fm);
    $sel_family=mysql_query("select con from cit_data where sid='$r_fm[2]' and did='$r_fm[3]' and tid='$r_fm[4]' and vid='$r_fm[5]' and ward_num='$r_fm[6]' and hse_num='$r_fm[7]' and bar_code!='".$_GET['bar']."'");
    if(mysql_num_rows($sel_family)>0)
    {
        while($r_family=mysql_fetch_row($sel_family))
        {
            echo $r_family[0];
        }
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
                                            <li class="active"><a href="patient.php">New Patient</a></li>
                                            <li><a href="doctors.php">Doctors</a></li>
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
                    <div class="col-lg-12 col-md-12"><br /><br />
                        <div class="col-lg-6 col-md-6">
                         <h3>Patient Admission</h3>
                         <?php
                         if(isset($_GET['bar']))
                         {
                             $sel_pat=mysql_query("select * from cit_data where bar_code='".$_GET['bar']."'");
                             $r_pat=mysql_fetch_row($sel_pat);
                             ?>
                          <form method="post" class="clearfix" role="form" id="online_form_builder">
                         <table class="table table-bordered table-condensed table-hover table-responsive table-striped">                             
                             <tr>
                                 <td style="width: 50%"><center><img src="../authority/cit_pic/<?php echo $r_pat[11] ?>" class="img img-responsive img-thumbnail" style="height: 200px;" /><br /><strong><?php echo $r_pat[1] ?></strong></center></td>
                         <td><?php echo $r_pat[8] ?><br /><?php echo $r_pat[9] ?><hr />D.O.B : <?php echo $r_pat[13] ?><BR />Blood Group : <?php echo $r_pat[12] ?><br /><BR />
                         <center> <a href="patient.php?emargency=1&bar=<?php echo $_GET['bar'] ?>" class="btn btn-danger"><span class="fa fa-mail-forward"></span> Emergency Contact</a></center>
                         </td>
                             </tr>
                             <tr>
                                 <td>Department</td>
                                         <td><select name="dep" class="form-control" onchange="loaddoctor(this.value,'<?php echo $h_id ?>')">
                                                 <option>Choose Department</option>
                                                 <?php
                                                 $sel_dep=mysql_query("select * from department_data,hos_dep where department_data.id=hos_dep.dep_id and hos_dep.h_id='$h_id'");
                                                while($r_dep=mysql_fetch_row($sel_dep))
                                                {
                                                    ?>
                                                 <option value="<?php echo $r_dep[0] ?>"><?php echo $r_dep[1] ?></option>
                                                 <?php
                                                }
                                                 ?>
                                     </select></td>
                             </tr>
                             <script type="text/javascript">
                                 function loaddoctor(x,h)
                                 {
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                            document.getElementById("doct").innerHTML = xmlhttp.responseText;
                                        }
                                    };
                                    xmlhttp.open("GET", "get_doctor.php?d=" + x+"&h="+h, true);
                                    xmlhttp.send();
                                 }
                             </script>
                             <tr>
                                 <td>Choose Doctor</td>
                                 <td><span id="doct"><select name="doc" class="form-control" required="required">
                                                     <option value="">Choose Doctor</option>
                                                 </select></span></td>
                             </tr>
                             <tr>
                                 <td>Information to Doctor</td>
                                 <td><textarea name="ob" class="form-control"></textarea></td>
                             </tr>
                             <tr>
                                 <td colspan="2"><center><input type="submit" name="add_pat" value="Add Patient" class="btn btn-success" /></center></td>
                             </tr>
                         </table>
                          </form>
                         <?php
                         }
                         else
                         {
                         ?>
                         <div class="tab-pane fade in active" id="online_form">
                             <form method="post" class="clearfix" role="form" id="online_form_builder">
                                    <input type="text" name="barcode" class="form-control" placeholder="BARCODE ID" />
                                    <input type="submit" name="sub" value="Click Here" class="btn btn-success" />
				</form>
                                <div class="clearfix"></div>
                            
                            </div><!-- end online_form -->
                         <?php
                         }
                         ?>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <?php
                            $sel_pat=mysql_query("select * from new_patient where h_id='$h_id' and dt1='".date('Y-m-d')."'");
                            if(mysql_num_rows($sel_pat)>0)
                            {
                                ?>
                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                <tr>
                                    <td>#</td>
                                    <td>Patient Name</td>
                                    <td>Department</td>
                                    <td>Doctor</td>
                                    <td>Status</td>
                                </tr>
                                <?php
                                $i=1;
                                while($r_pat=mysql_fetch_row($sel_pat))
                                {
                                    ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td>
                                        <?php
                                        $sel_p1=mysql_query("select * from cit_data where bar_code='$r_pat[2]'");
                                        $r_p1=mysql_fetch_row($sel_p1);
                                        echo"<strong>$r_p1[1]</strong><br />$r_p1[8]<br /><span class='fa fa-phone'></span> $r_p1[10]";
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        
                                        $sel_d1=mysql_query("select * from department_data where id='$r_pat[9]'");
                                        $r_d1=mysql_fetch_row($sel_d1);
                                        echo "$r_d1[1]";
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        $sel_d2=mysql_query("select * from doc_data where em='$r_pat[10]'");
                                        $r_d2=mysql_fetch_row($sel_d2);
                                        echo "$r_d2[2]";
                                        ?>
                                    </td>
                                    <td><center>
                                        <?php
                                        if($r_pat[14]=="0")
                                        {
                                            ?>
                                        <span class="label label-danger" style="color: white" title="Waiting...">Waiting..</span>
                                        <?php
                                        }
                                         if($r_pat[14]=="1")
                                        {
                                            ?>
                                        <span class="label label-success" style="color: white" title="Out Patient">Out Patient</span>
                                        <?php
                                        }
                                         if($r_pat[14]=="2")
                                        {
                                            ?>
                                        <span class="label label-primary" style="color: white" title="Admitted...">Admitted..</span>
                                        <?php
                                        }
                                        ?>
                                </center></td>
                                </tr>
                                
                                <?php
                                $i++;
                                }
                                ?>
                            </table>
                            <?php
                            }
                            else
                            {
                                ?>
                            <div class="alert alert-danger">No Patient list found</div>
                            <?php
                            }
                            ?>
                        </div>
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