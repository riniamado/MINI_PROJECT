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
if(isset($_POST['add_pat']))
{
    $tmp=$_POST['tmp'];
    $bp=$_POST['bp'];
    $bw=$_POST['bw'];
    $dis=$_POST['dis'];
    $do=$_POST['do'];
    $fa=$_POST['fa'];
    $des="This Report is creatd by $r_stf[2]";
    $up=mysql_query("update new_patient set deses='$dis',doc_descp='$do',tmp='$tmp',wight='$bw',bp='$bp',st='$fa' where id='".$_GET['id']."'");
    if($up>0)
    {
        if($fa=="1")
        {
            //The patient status is OP
            $ins=mysql_query("insert into op_entry values('','$h_id','".$_SESSION['doc']."','".$_GET['id']."','".$_GET['bar']."','".date('Y-m-d')."','$des','1')");
            $e=mysql_insert_id();
            if($ins>0)
            {
                header("location:patient.php?id=".$_GET['id']."&bar=".$_GET['bar']."&entry=$e");
            }
        }
        if($fa=="2")
        {
            //The patient status is OP
            $ins=mysql_query("insert into admit_entry values('','$h_id','".$_SESSION['doc']."','".$_GET['id']."','".$_GET['bar']."','0')");
            echo mysql_error();
//$e=mysql_insert_id();
            if($ins>0)
            {
                header("location:patient.php");
            }
        }
    }
}
if(isset($_POST['add_mdcn']))
{
    $mdcn=$_POST['mdcn'];
    $qt=$_POST['qt'];
    $mdes=$_POST['mdes'];
    $ins=mysql_query("insert into op_medicine values('','$h_id','".$_SESSION['doc']."','".$_GET['entry']."','".$_GET['bar']."','$mdcn','$qt','0','$mdes','1')");
    if($ins>0)
    {
        header("location:patient.php?id=".$_GET['id']."&bar=".$_GET['bar']."&entry=".$_GET['entry']);
    }
}
if(isset($_GET['del']))
{
    $del_md=mysql_query("delete from op_medicine where id='".$_GET['del']."'");
    if($del_md>0)
    {
        header("location:patient.php?id=".$_GET['id']."&bar=".$_GET['bar']."&entry=".$_GET['entry']);
    }
}
if(isset($_POST['add_lab']))
{
    $rtst=$_POST['rtst'];
    $ins1=mysql_query("insert into op_lab values('','$h_id','".$_SESSION['doc']."','".$_GET['entry']."','".$_GET['bar']."','$rtst','0')");
    if($ins1>0)
    {
        header("location:patient.php?id=".$_GET['id']."&bar=".$_GET['bar']."&entry=".$_GET['entry']);
    }
}
if(isset($_GET['del1']))
{
    $del_md=mysql_query("delete from op_lab where id='".$_GET['del1']."'");
    if($del_md>0)
    {
        header("location:patient.php?id=".$_GET['id']."&bar=".$_GET['bar']."&entry=".$_GET['entry']);
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
                                            <li class="active"><a href="patient.php">My Patient</a></li>
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
	<div class="white-wrapper nopadding">
    	<div class="container">
        	<div class="general-row">
                <div class="custom-services">
                    <div class="col-lg-12 col-md-12"><br />
                        <div class="col-lg-6 col-md-6">
                            <?php
                            $sel_pat=mysql_query("select * from new_patient where h_id='$h_id' and dt1='".date('Y-m-d')."' and doc='".$_SESSION['doc']."' order by st asc");
                            if(mysql_num_rows($sel_pat)>0)
                            {
                                ?>
                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                <tr>
                                    <td colspan="5"><center><h4>PATIENT LIST</h4></center></td>
                                </tr>
                                <tr>
                                    <td>#</td>
                                    <td>Patient Name</td>                                    
                                    <td>Details</td>
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
                                        echo"<strong>$r_p1[1]</strong><br /><i class='fa fa-bar-chart'></i> $r_pat[2]";
                                        ?>
                                    </td>                                    
                                    <td>
                                        <?php 
                                        echo "$r_pat[3]";
                                        ?>
                                    </td>
                                    <td><center>
                                        <?php
                                        if($r_pat[14]=="0")
                                        {
                                            ?>
                                        <a href="patient.php?id=<?php echo $r_pat[0] ?>&bar=<?php echo $r_pat[2] ?>"><span class="label label-danger" style="color: white" title="View Deatils...">View Details</span></a>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        
                                        if($r_pat[14]=="1")
                                        {
                                            ?>
                                        <a href="patient.php?id=<?php echo $r_pat[0] ?>&bar=<?php echo $r_pat[2] ?>&entry1=<?php echo $r_pat[0] ?>"><span class="label label-success" style="color: white" title="Out Patient">Out Patient</span></a>
                                        <?php
                                        }                                        
                                        if($r_pat[14]=="2")
                                        {
                                            ?>
                                        <a href="patient.php"><span class="label label-warning" style="color: white" title="Admitted">Admitted</span></a>
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
                        <div class="col-lg-6 col-md-6">
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
                         <td><?php echo $r_pat[8] ?><br /><?php echo $r_pat[9] ?><br /><span class='fa fa-phone'></span><?php echo $r_pat[10] ?><hr />D.O.B : <?php echo $r_pat[13] ?><BR />Blood Group : <?php echo $r_pat[12] ?><br /><BR />
                             
                         </td>
                             </tr>
                             <tr>
                                 <td colspan="2"><center>
                                     <a href="mpurchase.php?bar=<?php echo $_GET['bar'] ?>&t=1" target="_BLANK"><span class="label label-warning">PREVIOUS TREATMENT HISTORY</span> </a>
                                 <a href="mpurchase.php?bar=<?php echo $_GET['bar'] ?>&t=2" target="_BLANK"><span class="label label-primary">MEDICINE PURCHASE HISTORY</span> </a>
                                 <a href="mpurchase.php?bar=<?php echo $_GET['bar'] ?>&t=3" target="_BLANK"><span class="label label-info">OLD LABORATORY REPORTS</span></a>
                             </center></td>
                             </tr>
                             <?php
                             if(isset($_GET['entry']))
                             {
                                 ?>
                             <tr>
                                 <td colspan="2"><strong><center>PROVIDE MEDICINE</center></strong></td>
                             </tr>
                             <tr>
                                 <td>Department</td>
                                 <td><select name="dep1" class="form-control" onchange="loadmdcn(this.value)">
                                         <option>Choose</option>
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
                             function loadmdcn(x)
                             {
                                 var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                            document.getElementById("mdcn1").innerHTML = xmlhttp.responseText;
                                        }
                                    };
                                    xmlhttp.open("GET", "get_medicin.php?d=" + x, true);
                                    xmlhttp.send();
                             }
                             </script>
                             <tr>
                                 <td>Medicine</td>
                                 <td><span id="mdcn1">
                                     <select name="mdcn" class="form-control">
                                         <option>Choose Medicine</option>
                                     </select></span>
                                 </td>
                             </tr>
                             <tr>
                                 <td>Quantity</td>
                                 <td><input type="text" name="qt" class="form-control" /></td>
                             </tr>
                             <tr>
                                 <td>Description</td>
                                 <td><textarea name="mdes" class="form-control"></textarea></td>
                             </tr>
                             <tr>
                                 <td colspan="2"><center><input type="submit" name="add_mdcn" value="ADD MEDICINE" class="btn btn-warning" style="float:right;" /></center></td>
                             </tr>
                             <tr>
                                 <td colspan="2">
                                     <?php
                                     $sel_md=mysql_query("select * from op_medicine where opentry_id='".$_GET['entry']."'");
                                     if(mysql_num_rows($sel_md)>0)
                                     {
                                         ?>
                                     <table class="table table-bordered table-condensed table-hover">
                                         <tr>
                                             <td>#</td>
                                             <td>Medicine</td>
                                             <td>Qty.</td>
                                             <td></td>
                                         </tr>
                                         <?php
                                         $i=1;
                                         while($r_md=mysql_fetch_row($sel_md))
                                        {
                                             ?>
                                         <tr>
                                             <td><?php echo $i ?></td>
                                             <td>
                                                 <?php
                                                 $sel_mn=mysql_query("select * from medicin_data where id='$r_md[5]'");
                                                 $r_mn=mysql_fetch_row($sel_mn);
                                                 echo $r_mn[2];
                                                 ?>
                                             </td>
                                             <td>
                                                 <?php
                                                 echo"$r_md[6] <span style='float:right'>($r_md[8])</span>";
                                                 ?>
                                             </td>
                                             <td><center><a href="patient.php?id=<?php echo $_GET['id'] ?>&bar=<?php echo $_GET['bar'] ?>&entry=<?php echo $_GET['entry'] ?>&del=<?php echo $r_md[0] ?>"><span class="fa fa-trash-o" style="color: red;"></span></a></center></td>
                                         </tr>
                                         <?php
                                         $i++;
                                        }
                                         ?>
                                     </table>
                                     <?php                                     
                                     }
                                     ?>
                                     
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="2"><strong><center>REQUIRED LAB TEST</center></strong></td>
                             </tr>
                             <tr>                                 
                                 <td colspan="2"><strong>Choose Required Test</strong><br />
                                     <select name="rtst" class="form-control" style="width:85%; float: left;" onchange="loadldata(this.value)">
                                         <option>Choose Test</option>
                                         <?php
                                         $sel_lab=mysql_query("select * from labtest_data");
                                         while($r_lab=mysql_fetch_row($sel_lab))
                                         {
                                             ?>
                                         <option value="<?php echo $r_lab[0] ?>"><?php echo $r_lab[1] ?></option>
                                         <?php
                                         }
                                         ?>
                                     </select>
                                     <input type="submit" name="add_lab" value="+" class="btn btn-danger" style="width: 15%" />
                                     <script type="text/javascript">
                                     function loadldata(x)
                                     {
                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function() {
                                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                                document.getElementById("ld").innerHTML = xmlhttp.responseText;
                                            }
                                        };
                                        xmlhttp.open("GET", "get_lab.php?id=" + x, true);
                                        xmlhttp.send();
                                     }
                                     </script><br />
                                     <div id="ld"></div>
                                     <?php
                                     $sel_l1=mysql_query("select * from op_lab where opentry_id='".$_GET['entry']."'");
                                     if(mysql_num_rows($sel_l1)>0)
                                     {
                                         ?>
                                     <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                         <tr>
                                             <td>#</td>
                                             <td>Test Name</td>
                                             <td></td>
                                         </tr>
                                         <?php
                                         $i=1;
                                         while($r_l1=mysql_fetch_row($sel_l1))
                                         {
                                             ?>
                                         <tr>
                                             <td><?php echo $i ?></td>
                                             <td>
                                                 <?php
                                                 $sel_test=mysql_query("select * from labtest_data where id='$r_l1[5]'");
                                                 $r_test=mysql_fetch_row($sel_test);
                                                 echo $r_test[1];
                                                 ?>
                                             </td>
                                             <td><center><a href="patient.php?id=<?php echo $_GET['id'] ?>&bar=<?php echo $_GET['bar'] ?>&entry=<?php echo $_GET['entry'] ?>&del1=<?php echo $r_l1[0] ?>"><span class="fa fa-trash-o" style="color: red;"></span></a></center></td>
                                         </tr>
                                         <?php
                                             $i++;
                                         }
                                         ?>
                                     </table>
                                     <?php
                                     }
                                     ?>
                                 </td>
                             </tr>
                             <?php
                             }
                             else if(isset($_GET['entry1']))
                             {
                                ?>
                             <tr>
                                 <td colspan="2">
                                     <?php
                                     $sel_md=mysql_query("select * from op_medicine where opentry_id='".$_GET['entry1']."'");
                                     if(mysql_num_rows($sel_md)>0)
                                     {
                                         ?>
                                     <table class="table table-bordered table-condensed table-hover">
                                         <tr>
                                             <td>#</td>
                                             <td>Medicine</td>
                                             <td>Qty.</td>
                                            
                                         </tr>
                                         <?php
                                         $i=1;
                                         while($r_md=mysql_fetch_row($sel_md))
                                        {
                                             ?>
                                         <tr>
                                             <td><?php echo $i ?></td>
                                             <td>
                                                 <?php
                                                 $sel_mn=mysql_query("select * from medicin_data where id='$r_md[5]'");
                                                 $r_mn=mysql_fetch_row($sel_mn);
                                                 echo $r_mn[2];
                                                 ?>
                                             </td>
                                             <td>
                                                 <?php
                                                 echo"$r_md[6] <span style='float:right'>($r_md[8])</span>";
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
                                     ?>
                                     
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="2">
                                 <?php
                                 $sel_l1=mysql_query("select * from op_lab where opentry_id='".$_GET['entry1']."'");
                                     if(mysql_num_rows($sel_l1)>0)
                                     {
                                         ?>
                                     <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                         <tr>
                                             <td>#</td>
                                             <td>Test Name</td>
                                            
                                         </tr>
                                         <?php
                                         $i=1;
                                         while($r_l1=mysql_fetch_row($sel_l1))
                                         {
                                             ?>
                                         <tr>
                                             <td><?php echo $i ?></td>
                                             <td>
                                                 <?php
                                                 $sel_test=mysql_query("select * from labtest_data where id='$r_l1[5]'");
                                                 $r_test=mysql_fetch_row($sel_test);
                                                 echo $r_test[1];
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
                                     ?>
                                 </td>
                             </tr>
                             <?php
                             }
                             else
                             {
                             ?>
                             <tr>
                                 <td>Temperature</td>
                                 <td><input type="text" name="tmp" class="form-control" /></td>
                             </tr>
                             <tr>
                                 <td>Blood Pressure</td>
                                 <td><input type="text" name="bp" class="form-control" /></td>
                             </tr>
                             <tr>
                                 <td>Body Weight</td>
                                 <td><input type="text" name="bw" class="form-control" /></td>
                             </tr>                              
                             <tr>
                                 <td>Disease</td>
                                 <td><select name="dis" class="form-control">
                                         <option value="">Choose Disease</option>                                         
                                         <?php
                                         $sel_ds=mysql_query("select * from disease_data where dep='$r_stf[6]'");
                                         while($r_ds=mysql_fetch_row($sel_ds))
                                         {
                                             ?>
                                         <option><?php echo $r_ds[2] ?></option>
                                         <?php
                                         }
                                         ?>
                                     </select>
                                 </td>
                             </tr>
                             <tr>
                                 <td>Doctor Observation</td>
                                 <td><textarea name="do" class="form-control"></textarea></td>
                             </tr>
                             <tr>
                                 <td colspan="2"><strong>Further Action</strong><br /><center>
                                 <input type="radio" name="fa" value="1" /> Out Patient (OP) | <input type="radio" name="fa" value="2" /> Admitted </center>
                                 </td>
                             </tr>
                             <tr>
                                 <td colspan="2"><center><input type="submit" name="add_pat" value="Continue.." class="btn btn-success" style="float:right;" /></center></td>
                             </tr>
                             <?php
                             }
                             ?>
                         </table>
                          </form>
                              <?php
                         }
                         ?>
                        </div>
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