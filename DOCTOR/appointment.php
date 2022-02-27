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
if(isset($_POST['sub']))
{
    $bar=$_POST['bar'];
    $inf=$_POST['inf'];
    $up=  mysql_query("update appointment set st=1 where id='".$_GET['aid']."'");
    if($up>0)
    {
        $ins=mysql_query("insert into new_patient values('','$h_id','$bar','$inf','','','','','','$r_stf[6]','".$_SESSION['doc']."','".date('Y-m-d')."','','".date('Y-m')."','0')");
        $id=  mysql_insert_id();
        if($ins>0)
        {
            //Mail to others
            $sel_nxt=mysql_query("select * from appointment where doc_id='".$_SESSION['doc']."' and dt='".date('y-m-d')."' and id>'".$_GET['aid']."' limit 2");
            
            if(mysql_num_rows($sel_nxt)>0)
            {
                while($r_nxt=mysql_fetch_row($sel_nxt))
                {
                    $bar_nxt=$r_nxt[3];
                    $sel_con=mysql_query("select con from cit_data where bar_code='$bar_nxt'");
                    $r_con=mysql_fetch_row($sel_con);
                    echo "$bar_nxt,$r_con[0]";
                }
            }
            header("location:patient.php?id=$id&bar=$bar");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from jollythemes.com/html/jollymedic/index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Nov 2016 11:13:49 GMT -->
<head>
                                                            <script src="js/jquery1111.min.js" type="text/javascript"></script>
                                                           
                                                            <link rel="stylesheet" href="colorbox/colorbox.css" />   
                                                            <script src="colorbox/jquery.colorbox.js"></script>
                                                            <script>
                                                            function shomed1(a,b)
                                                            {
                                                                $.colorbox({iframe:true, width:"30%", height:"470px", href: "medicine.php?sid="+a+"&pid="+b});
                                                              }
                                                            function shoopinfo(x)
                                                            {
                                                                $.colorbox({iframe:true, width:"30%", height:"470px", href: "showop.php?aid="+x});
                                                            }
                                                            function shoadmitinfo(x)
                                                            {
                                                                $.colorbox({iframe:true, width:"60%", height:"470px", href: "showadmit.php?aid="+x});
                                                            }
                                                            </script>
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
                                            <li><a href="patient.php">My Patient</a></li>
                                            <li class="active"><a href="appointment.php">Appointments</a></li>
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


	<div class="white-wrapper nopadding">
    	
	<div class="grey-wrapper">
    	<div class="container">
        	<div class="general_row">
            		
                
<div class="custom_tab_2 row">
    <div class="col-lg-12">
         <h3>My Direct Appointments</h3>
        <div class="col-lg-6">
           
            <?php
            $sel_app=mysql_query("select * from appointment where doc_id='".$_SESSION['doc']."' and dt='".date('Y-m-d')."' and st=0");
            if(mysql_num_rows($sel_app)>0)
            {
                ?>
            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                <tr>
                    <td>#</td>
                    <td>Patient Details</td>
                    <td></td>
                </tr>
                <?php
                $i=1;
                while($r_app=mysql_fetch_row($sel_app))
                {
                    ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td>
                        <?php
                        $sel_cit=mysql_query("select * from cit_data where bar_code='$r_app[3]'");
                        $r_cit=mysql_fetch_row($sel_cit);
                        echo"$r_cit[1] ($r_app[3])<br />$r_cit[8]";
                        ?>
                    </td>
                    <td><center>
                        <a href="appointment.php?bar=<?php echo $r_app[3] ?>&t=1"><i class="glyphicon glyphicon-file" title="Hospital Records" style="color: green;"></i></a><br />
                        <a href="appointment.php?bar=<?php echo $r_app[3] ?>&t=3"><i class="glyphicon glyphicon-picture" title="Lab Reports" style="color:red;"></i></a><br />
                        <a href="appointment.php?bar=<?php echo $r_app[3] ?>&t=2&aid=<?php echo $r_app[0] ?>"><i class="glyphicon glyphicon-plus-sign" title="Add Now" style="color:blueviolet;"></i></a>
                </center>
                    </td>
                </tr>
                <?php
                $i++;
                }
                ?>
            </table>
            <?php
            }
            ?>
        </div>
        <div class="col-lg-6">
            
                            <?php
                            if(isset($_GET['t']))
                            {
                                if($_GET['t']==1)
                                {
                                   $sel_admit=mysql_query("select * from new_patient where bar_code='".$_GET['bar']."' order by id desc");
                                   if(mysql_num_rows($sel_admit)>0)
                                   {
                                       ?>
                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                <tr>
                                    <td></td>
                                    <td>Hospital Name</td>
                                    <td>Disease</td>
                                    <td>Date</td>
                                    <td>Doctor</td>
                                    <td>Status</td>
                                </tr>
                                <?php
                                $i=1;
                                while($r_admit=mysql_fetch_row($sel_admit))
                                       {
                                           ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php 
                                    echo $r_admit[1] 
                                            ?> </td>
                                    <td><?php echo $r_admit[4] ?> </td>
                                    <td><?php echo $r_admit[11] ?></td>
                                    <td><?php echo $r_admit[10] ?></td>
                                    <td>
                                        <?php
                                        if($r_admit[14]==0)
                                        {
                                            ?>
                                        <span class="label label-success">Waiting....</span>
                                        <?php
                                        }
                                        if($r_admit[14]==1)
                                        {
                                            ?>
                                        <span class="label label-primary" onclick="shoopinfo('<?php echo $r_admit[0] ?>')" style="cursor: pointer;">Out Patient</span>
                                        <?php
                                        }
                                        if($r_admit[14]==2)
                                        {
                                            ?>
                                        <span class="label label-danger" onclick="shoadmitinfo('<?php echo $r_admit[0] ?>')" style="cursor: pointer;">Admitted..</span>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                                       }
                                ?>
                            </table>
                            <?php                                       
                                   }
                                }
                                if($_GET['t']==2)
                                {
                                    ?>
            <form method="post">
            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                <tr>
                    <td>Patient ID</td>
                    <td><input type="text" name="bar" class="form-control" value="<?php echo $_GET['bar'] ?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td>Information</td>
                    <td><textarea name="inf" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><center><input type="submit" name="sub" value="Add Patient" class="btn btn-danger" /></center></td>
                </tr>
            </table>
            </form>
            <?php
                                }
                                if($_GET['t']==3)
                                {
                                    ?>
                                    <script type="text/javascript">
                                                            function  shodetail(x){
                                                                $("#"+x).slideToggle(1000);
                                                            }
                                                            </script>
                                    <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                        <tr>
                                            <td>#</td>
                                            <td>Description</td>
                                            <td>More</td>
                                        </tr>
                                        <?php
                                        $i=1;
                                        $sel_test=mysql_query("select * from purchase_lab where barcode='".$_GET['bar']."' order by id desc");
                                        while($r_test=mysql_fetch_row($sel_test))
                                        {
                                            ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td>Test Done from <?php 
                                            $sel_store=mysql_query("select * from org_data where unme='$r_test[1]'");
                                            $r_store=mysql_fetch_row($sel_store);
                                            echo $r_store[1] ?> on <?php echo $r_test[4] ?>
                                            </td>
                                            <td><center><span class="glyphicon glyphicon-arrow-down" style="cursor: pointer;" onclick="shodetail('<?php echo $i ?>')"></span></center></td>
                                        </tr>
                                        <tr id="<?php echo $i ?>" style="display: none;">
                                                                    <td colspan="4">
                                                                        <table class="table table-bordered" style="margin-top: 10px;">
                                                                <?php
                                                                $sel_l1=mysql_query("select * from purchase_lab_test where pid='$r_test[0]'");
                                                               $j=1;
                                                                while($r_l1=mysql_fetch_row($sel_l1))
                                                                {
                                                                    ?>
                                                                
                                                                <tr>
                                                                    <td><?php echo $j ?></td>
                                                                    <td colspan="2">
                                                                        <?php
                                                                        $sel_tst=mysql_query("select * from labtest_data where id='$r_l1[5]'");
                                                                        $r_tst=mysql_fetch_row($sel_tst);
                                                                        echo $r_tst[1];
                                                                        ?>
                                                                    </td>
                                                                    <td><center>
                                                                    <?php
                                                                    if($r_l1[9]==0)
                                                                    {
                                                                      ?>
                                                                    <span class="glyphicon glyphicon-eye-close" title="No Data found" style="cursor: pointer; color: red;"></span>    
                                                                        <?php
                                                                    }
                                                                    else
                                                                    {
                                                                      ?>
                                                                    <a href="../lab/<?php echo"$r_l1[8]/$r_l1[7]" ?>" target="_BLANK"><span class="glyphicon glyphicon-download" title="Download File" style="cursor: pointer; color: green"></span></a>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    </center></td>
                                                                </tr>
                                                           
                                                                <?php
                                                                $j++;
                                                                }
                                                                ?>
                                                                 </table>
                                                            </td>
                                                            </tr>
                                        <?php
                                        $i++;
                                        }
                                        ?>
                                    </table>
                                    <?php
                                }
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