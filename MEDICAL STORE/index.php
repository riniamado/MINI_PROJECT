<?php
ob_start();
include '../connection.php';
session_start();
if(isset($_SESSION['mstore']))
{
    $sel_aut=mysql_query("select * from org_data where unme='".$_SESSION['mstore']."'");
    $r_aut=mysql_fetch_row($sel_aut);
    
}
else
{
    header("location:../index.php");
}
if(isset($_POST['sub1']))
{
    $cn=$_POST['cn'];
    $sel_p=mysql_query("select * from op_entry where bar_code='$cn' order by id desc");
    if(mysql_num_rows($sel_p)>0)
    {
        $r_p=mysql_fetch_row($sel_p);
        header("location:index.php?bar=$cn&id=$r_p[0]");
    }
    else
        {
        header("location:index.php?error=1");
    }
    
}
if(isset($_POST['sub2']))
{
    $cn=$_POST['cn'];
    $ins_ms=mysql_query("insert into purchase_medicine values('','".$_SESSION['mstore']."','$cn','0','".date('Y-m-d')."')");
    $insid=  mysql_insert_id();
    if($ins_ms>0)
    {
     header("location:index.php?bar=$cn&id1=$insid");
    }
}
if(isset($_POST['proceed']))
{
    $ins_ms=mysql_query("insert into purchase_medicine values('','".$_SESSION['mstore']."','".$_GET['bar']."','".$_GET['id']."','".date('Y-m-d')."')");
    $insid=  mysql_insert_id();
    if($ins_ms>0)
    {
        header("location:index.php?bar=".$_GET['bar']."&id=".$_GET['id']."&insid=$insid");
    }
}
if(isset($_POST['sub10']))
{
    $md5=$_POST['md5'];
    $qty1=$_POST['qty1'];
    $ins5=mysql_query("insert into purchase_medicine_data values('','".$_SESSION['mstore']."','".$_GET['id1']."','".$_GET['bar']."','$md5','$qty1')");
    if($ins5>0)
    {
        header("location:index.php?bar=".$_GET['bar']."&id1=".$_GET['id1']);
    }
}
if(isset($_GET['del5']))
{
    $del5=mysql_query("delete from purchase_medicine_data where id='".$_GET['del5']."'");
    if($del5>0)
    {
        header("location:index.php?bar=".$_GET['bar']."&id1=".$_GET['id1']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
                                                            <script src="js/jquery1111.min.js" type="text/javascript"></script>
                                                           
                                                            <link rel="stylesheet" href="colorbox/colorbox.css" />   
                                                            <script src="colorbox/jquery.colorbox.js"></script>
                                                            <script>
                                                            function shomed1(a,b){
                                                                            $.colorbox({iframe:true, width:"30%", height:"470px", href: "medicine.php?sid="+a+"&pid="+b});
                                                                          }
                                                            </script>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>ME CARD :: <?php echo $r_aut[1] ?> </title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../authority/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../authority/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="../authority/assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../authority/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../authority/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="../authority/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../authority/assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../authority/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../authority/assets/js/html5shiv.min.js"></script>
		<script src="../authority/assets/js/respond.min.js"></script>
		<![endif]-->
                
                                                            
	</head>

	<body class="no-skin">           
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							ME-CARD :: <?php echo $r_aut[1] ?> 
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="../authority/assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $r_aut[6] ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="admin_password.php">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li class="divider"></li>

								<li>
                                                                    <a href="../logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="active">
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
                                        <li class="">
                                                 <a href="../logout.php">
									<i class="menu-icon fa fa-sign-out"></i>
									Logout
								</a>

								<b class="arrow"></b>
							</li>
                                        
                                </ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; stats
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
                                                    <div class="col-md-12 col-lg-12">
                                                        <div class="col-lg-7 col-md-7">
                                                            
                                                            <?php
                                                            if(isset($_GET['id']))
                                                            {
                                                                $sel_data=mysql_query("select * from op_entry,cit_data,abt_hospital where cit_data.bar_code=op_entry.bar_code and abt_hospital.h_id=op_entry.hid and op_entry.id='".$_GET['id']."' and op_entry.bar_code='".$_GET['bar']."'");
                                                                if(mysql_num_rows($sel_data)>0)
                                                                {
                                                                $r_data=mysql_fetch_row($sel_data);
                                                                
                                                                $sel_md=mysql_query("select * from op_medicine where opentry_id='".$_GET['id']."'");
                                                                if(mysql_num_rows($sel_md)>0)
                                                                {
                                                                    ?>
                                                            <table class="table table-bordered table-hover table-responsive table-striped">
                                                                <tr>
                                                                    <td colspan="2"><center>
                                                                        <img src="../authority/cit_pic/<?php echo $r_data[19] ?>" class="img img-responsive" style="height: 150px;"                                                                        
                                                                </center></td>
                                                                <td colspan="3">
                                                                    <?php echo $r_data[9] ?><br /><?php echo $r_data[16] ?><br /><span class='fa fa-phone'></span><?php echo $r_data[18] ?><hr />D.O.B : <?php echo $r_data[21] ?><BR />Blood Group : <?php echo $r_data[20] ?><br /><BR />
                                                                </td>
                                                                </tr>
                                                                <script type="text/javascript">
                                                                    function insert_mdc(x,qty,bar,pid,mid)
                                                                    {     
                                                                        if(qty=="" || qty==null)
                                                                        {
                                                                           document.getElementById("out"+x).focus(); 
                                                                        }
                                                                        else
                                                                        {
                                                                        var xmlhttp = new XMLHttpRequest();
                                                                        xmlhttp.onreadystatechange = function() {
                                                                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                                                                document.getElementById("out"+x).innerHTML = xmlhttp.responseText;
                                                                            }
                                                                        };
                                                                        xmlhttp.open("GET", "sale_medicine.php?x=" + x+"&qty="+qty+"&pid="+pid+"&bar="+bar+"&mid="+mid, true);
                                                                        xmlhttp.send();
                                                                    }
                                                                }
                                                                    </script>
                                                                <?php
                                                                if(isset($_GET['insid']))
                                                                {
                                                                    ?>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>Medicine Name</td>
                                                                    <td>Qty. & Description</td>
                                                                    <td colspan="2">Provide</td>
                                                                   
                                                                </tr>
                                                                <?php
                                                                $i=1;
                                                                $t1=0;
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
                                                                    <td><?php
                                                 echo"$r_md[6] <span style='float:right'>($r_md[8])</span>";
                                                 ?></td>
                                                                    <td colspan="2">
                                                                        <?php
                                                                        $bal=$r_md[6]-$r_md[7];
                                                                        if($bal>=1)
                                                                        {
                                                                        ?>
                                                                        <span id="out<?php echo $r_md[0] ?>"><input type="text" placeholder="<?php echo $bal ?>" id="count<?php echo $i ?>" class="form-control" onblur="insert_mdc('<?php echo $r_md[0] ?>',this.value,'<?php echo $_GET['bar'] ?>','<?php echo $_GET['insid'] ?>','<?php echo $r_md[5] ?>')" /></span>
                                                                    <?php
                                                                        }
                                                                        else
                                                                        {
                                                                            echo"<font color='red'>Provided</font>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                   
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                                }
                                                                ?>
                                                                
                                                                <?php
                                                                }
                                                                else
                                                                    {
                                                                ?>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>Medicine Name</td>
                                                                    <td>Qty. & Description</td>
                                                                    <td>Purchased</td>
                                                                    <td>Amount</td>
                                                                </tr>
                                                                
                                                                <?php
                                                                $i=1;
                                                                $t1=0;
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
                                                                    <td><?php
                                                 echo"$r_md[6] <span style='float:right'>($r_md[8])</span>";
                                                 ?></td>
                                                                    <td><?php
                                                 echo"$r_md[7]" ?></td>
                                                                    <td>
                                                                        <?php
                                                                        $amt=$r_mn[3];
                                                                        $qty=$r_md[6];
                                                                        $tot=$amt*$qty;
                                                                        echo "$tot/-";
                                                                        $t1+=$tot;
                                                                                ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                                }
                                                                ?>
                                                                <tr>
                                                                    <td colspan="4"><strong>Total</strong></td>
                                                                    <td><?php echo "$t1/-" ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5"><center>
                                                                        <?php
                                                                        echo $r_data[6] 
                                                                                ?> on <?php
                                                                        echo $r_data[5] 
                                                                                ?>
                                                                        <img src="../hospital/logo/<?php echo $r_data[30] ?>" class="img img-responsive" />
                                                                    </center></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5"><form method="post"><center><input type="submit" name="proceed" value="Proceed To Sale" class="btn btn-success" /> <a href="" class="btn btn-danger">Cancel</a></center></form></td>
                                                                </tr>
                                                                <?php
                                                                    }
                                                                    ?>
                                                            </table>
                                                            <?php
                                                                }
                                                            }
                                                            }
                                                            else if(isset($_GET['id1']))
                                                            {
                                                                ?>
                                                            <form method="post">
                                                                <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                                    <tr>
                                                                        <td>Choose Medicine</td>
                                                                        <td><select name="md5" class="form-control" required="required">
                                                                                <option value="">Choose</option>
                                                                                <?php
                                                                                $sel_md5=mysql_query("select * from medicin_data order by medicin_nme asc");
                                                                                while($r_md5=mysql_fetch_row($sel_md5))
                                                                                {
                                                                                    ?>
                                                                                <option value="<?php echo"$r_md5[0]" ?>"><?php echo "$r_md5[2]($r_md5[4])" ?></option>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </select></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Qty.</td>
                                                                        <td><input type="text" name="qty1" class="form-control" required="required" /></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"><center><input type="submit" name="sub10" value="Sale Item" class="btn btn-danger" /></center></td>
                                                                    </tr>
                                                                </table>
                                                                <?php
                                                                $sel_m5=mysql_query("select * from purchase_medicine_data where pid='".$_GET['id1']."'");
                                                                if(mysql_num_rows($sel_m5)>0)
                                                                {
                                                                    $sel_cit1=mysql_query("select * from cit_data where bar_code='".$_GET['bar']."'");
                                                                    $r_cit1=mysql_fetch_row($sel_cit1);
                                                                    ?>
                                                                <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                                    <tr>
                                                                        <td colspan="4">
                                                                            <table class="table">
                                                                <tr>
                                                                    <td style="width: 35%"><center>
                                                                        <img src="../authority/cit_pic/<?php echo $r_cit1[11] ?>" class="img img-responsive" style="height: 150px;"                                                                        
                                                                </center></td>
                                                                <td>
                                                                    <?php echo $r_cit1[1] ?><br /><?php echo $r_cit1[8] ?><br /><span class='fa fa-phone'></span><?php echo $r_cit1[10] ?><hr />D.O.B : <?php echo $r_cit1[13] ?><BR />Blood Group : <?php echo $r_cit1[12] ?><br /><BR />
                                                                    <a href="index.php"> <span class="label label-danger">BACK To SALE</span></a> <a href="index.php?history=1&bar1=<?php echo $_GET['bar'] ?>"><span class="label label-primary">Purchase History</span></a>
                                                                </td>
                                                                </tr>
                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>#</td>
                                                                        <td>Medicine Name</td>
                                                                        <td>Qty.</td>
                                                                        <td>Amount</td>
                                                                    </tr>
                                                                    <?php
                                                                    $i=1;
                                                                    $total=0;
                                                                    while($r_m5=mysql_fetch_row($sel_m5))
                                                                    {
                                                                        ?>
                                                                    <tr>
                                                                        <td><?php echo $i ?></td>
                                                                        <td>
                                                                            <?php
                                                                            $sel_m=mysql_query("select * from medicin_data where id='$r_m5[4]'");
                                                                            $r_m=mysql_fetch_row($sel_m);
                                                                            echo $r_m[2];
                                                                            ?>
                                                                        </td>
                                                                        <td><?php echo $r_m5[5] ?></td>
                                                                        <td>
                                                                            <?php
                                                                            $amt=$r_m5[5]*$r_m[3];
                                                                            echo $amt; 
                                                                            $total+=$amt;
                                                                            ?>
                                                                            <a href="index.php?bar=<?php echo $_GET['bar'] ?>&id1=<?php echo $_GET['id1'] ?>&del5=<?php echo $r_m5[0] ?>"><span class="glyphicon glyphicon-trash" style="color: red; float: right;"></span></a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $i++;
                                                                    }
                                                                    ?>
                                                                    <tr>
                                                                        <td colspan="3"><center><b>TOTAL</b></center></td>
                                                                        <td><?php echo $total ?></td>
                                                                    </tr>
                                                                </table>
                                                                <?php
                                                                }
                                                                else
                                                                {
                                                                    
                                                                }
                                                                ?>
                                                            </form>
                                                            <?php
                                                            }
                                                            else
                                                            {                                                                
                                                            ?>
                                                            <h3>New Customer</h3>
                                                            <form method="post">
                                                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                                <tr>                                                                   
                                                                    <td colspan="2"><input type="text" name="cn" placeholder="Customer Card Number" class="form-control" required="required" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width: 50%"><input type="submit" name="sub1" value="With Prescription" class="btn btn-success" style="width: 100%" /></td>
                                                                    <td><input type="submit" name="sub2" value="Without Prescription" class="btn btn-danger" style="width: 100%" /></td>
                                                                </tr>
                                                            </table>
                                                                <?php
                                                                if(isset($_GET['error']))
                                                                {
                                                                    echo"<font color='red'>Invalid User ID, No Doctor Preescription Found</font>";
                                                                }
                                                                ?>
                                                                </form>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5">
                                                            <?php
                                                            if(isset($_GET['sale']))
                                                            {
                                                                $sel_sal1=mysql_query("select * from purchase_medicine_data where pid='".$_GET['sale']."'");
                                                                $sel_cit=mysql_query("select * from cit_data where bar_code='".$_GET['bar1']."'");
                                                                $r_cit=mysql_fetch_row($sel_cit);
                                                                ?>
                                                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <table class="table">
                                                                <tr>
                                                                    <td style="width: 35%"><center>
                                                                        <img src="../authority/cit_pic/<?php echo $r_cit[11] ?>" class="img img-responsive" style="height: 150px;"                                                                        
                                                                </center></td>
                                                                <td>
                                                                    <?php echo $r_cit[1] ?><br /><?php echo $r_cit[8] ?><br /><span class='fa fa-phone'></span><?php echo $r_cit[10] ?><hr />D.O.B : <?php echo $r_cit[13] ?><BR />Blood Group : <?php echo $r_cit[12] ?><br /><BR />
                                                                    <a href="index.php"> <span class="label label-danger">BACK To SALE</span></a> <a href="index.php?history=1&bar1=<?php echo $_GET['bar1'] ?>"><span class="label label-primary">Purchase History</span></a>
                                                                </td>
                                                                </tr>
                                                            </table>
                                                            </td>
                                                            </tr>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>Medicine</td>
                                                                    <td>Qty</td>
                                                                </tr>
                                                                <?php
                                                                $j=1;
                                                                while($r_s1=mysql_fetch_row($sel_sal1))
                                                                {
                                                                    ?>
                                                                <tr>
                                                                    <td><?php echo $j ?></td>
                                                                    <td>
                                                                        <?php
                                                                      $sel_mn=mysql_query("select * from medicin_data where id='$r_s1[4]'");
                                                                        $r_mn=mysql_fetch_row($sel_mn);
                                                                        echo $r_mn[2];   
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $r_s1[5] ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $j++;
                                                                }
                                                                ?>
                                                            </table> 
                                                            <?php                                                                
                                                            }
                                                            else if(isset($_GET['history']))
                                                            {
                                                                $sel_pr=mysql_query("select distinct dt from purchase_medicine where bar_code='".$_GET['bar1']."' order by id desc");
                                                                if(mysql_num_rows($sel_pr)>0)
                                                                {
                                                                    ?>
                                                            <script>
                                                            function shosale1(x)
                                                            {
                                                                $("#a"+x).toggle(500);
                                                            }
                                                            </script>
                                                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                                <?php
                                                                $i=1;
                                                                while($r_pr=mysql_fetch_row($sel_pr))
                                                                {
                                                                    ?>
                                                                <tr>
                                                                    <td><div style="cursor: pointer; background-color: #006dcc; color: white;" onclick="shosale1('<?php echo $i ?>')"><b><?php echo $r_pr[0] ?></b></div><br />
                                                                        <div id="a<?php echo $i ?>" style="display: none;">
                                                                            <?php
                                                                            $sel_det=mysql_query("select * from purchase_medicine where dt='$r_pr[0]' and bar_code='".$_GET['bar1']."'");
                                                                            $j=1;
                                                                            while($r_det=  mysql_fetch_row($sel_det))
                                                                            {
                                                                                $sel_shop=mysql_query("select * from org_data where unme='$r_det[1]'");
                                                                                $r_shop=mysql_fetch_row($sel_shop);
                                                                                if($r_det[3]=="0")
                                                                                {
                                                                                    $p="$j. Direct Purchase from <b><span style='cursor:pointer;' onclick='shomed1($r_det[0],$r_det[3])'>$r_shop[1]</span></b><br />";
                                                                                }
                                                                                else
                                                                                {
                                                                                    $p="$j. Purchase from  from <b><span style='cursor:pointer;' onclick='shomed1($r_det[0],$r_det[3])'>$r_shop[1]</span></b> Base on Prescription<br />";
                                                                                }
                                                                                echo $p;
                                                                                $j++;
                                                                            }
                                                                            ?>
                                                                        </div>
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
                                                            else
                                                            {
                                                            ?>
                                                            <h3>Todays Sales</h3>
                                                            <?php
                                                            $sel_sale=mysql_query("select * from purchase_medicine where store_id='".$_SESSION['mstore']."' and dt='".date('Y-m-d')."'");
                                                            if(mysql_num_rows($sel_sale)>0)
                                                            {
                                                                
                                                                ?>
                                                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                                
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>Customer ID</td>
                                                                    <td>
                                                                </tr>
                                                                <?php
                                                                $j=1;
                                                                while($r_sale=mysql_fetch_row($sel_sale))
                                                                {
                                                                    ?>
                                                                <tr>
                                                                    <td><?php echo $j ?></td>
                                                                    <td><?php echo $r_sale[2] ?></td>
                                                                    <td><a href="index.php?sale=<?php echo $r_sale[0] ?>&bar1=<?php echo $r_sale[2] ?>"><i class="fa fa-book"></i></a></td>
                                                                </tr>
                                                                <?php
                                                                $j++;
                                                                }
                                                                ?>
                                                            </table>
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                                echo"No Sale Record found";
                                                            }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Trinity </span>
							Technologies &copy; 2016-2017
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		

		<!-- <![endif]-->

		<!--[if IE]>
<script src="../authority/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../authority/assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="../authority/assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="../authority/assets/js/jquery-ui.custom.min.js"></script>
		<script src="../authority/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="../authority/assets/js/jquery.easypiechart.min.js"></script>
		<script src="../authority/assets/js/jquery.sparkline.index.min.js"></script>
		<script src="../authority/assets/js/jquery.flot.min.js"></script>
		<script src="../authority/assets/js/jquery.flot.pie.min.js"></script>
		<script src="../authority/assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="../authority/assets/js/ace-elements.min.js"></script>
		<script src="../authority/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				  });
				}
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>
	</body>
</html>
