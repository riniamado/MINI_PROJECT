<?php
ob_start();
include '../connection.php';
session_start();
if(isset($_SESSION['lab']))
{
    $sel_aut=mysql_query("select * from org_data where unme='".$_SESSION['lab']."'");
    $r_aut=mysql_fetch_row($sel_aut);
    
}
else
{
    header("location:../index.php");
}
if(isset($_POST['sub1']))
{
    $cn=$_POST['cn'];
    $chk_op=mysql_query("select * from op_entry where bar_code='$cn' order by id desc");
    if(mysql_num_rows($chk_op)>0)
    {
        $r_op=mysql_fetch_row($chk_op);
        header("location:index.php?opid=$r_op[0]&bar=$cn");
    }
    else
    {
        header("location:index.php?error=1");
    }
}
if(isset($_POST['sub']))
{
    $ins_lab=mysql_query("insert into purchase_lab values('','".$_SESSION['lab']."','".$_GET['bar']."','".$_GET['opid']."','".date('Y-m-d')."')");
    $insid=  mysql_insert_id();
    if($ins_lab>0)
    {
        header("location:index.php?opid=".$_GET['opid']."&bar=".$_GET['bar']."&ins=$insid");
    }
}
if(isset($_POST['sub2']))
{
    $cn=$_POST['cn'];
    $ins_dp=mysql_query("insert into purchase_lab values('','".$_SESSION['lab']."','$cn','0','".date('Y-m-d')."')");
    $insid=  mysql_insert_id();
    if($ins_dp>0)
    {
       header("location:index.php?dir=1&bar=".$cn."&ins=$insid"); 
    }
}
if(isset($_POST['add_rpt']))
{
    $id=$_POST['id'];
    $oplab=$_POST['oplab'];
    $rtyp=$_POST['rtyp'];
    $up=$_FILES['up']['name'];
    $sel_count=mysql_query("select * from purchase_lab_test where fil_typ='$rtyp'");
    $r_count=  mysql_num_rows($sel_count);
    $count=$r_count+1;
    $ext1=strrpos($up,".");
    $ext=substr($up,$ext1);
    $nfn="$count$ext";
    $up=mysql_query("update purchase_lab_test set test_file='$nfn',fil_typ='$rtyp',st=1 where id='$id'");
    if($up>0)
    {
        if(move_uploaded_file($_FILES['up']['tmp_name'], getcwd()."\\$rtyp\\$nfn"))
            {
            if($oplab>0)
            {
                $up1=mysql_query("update op_lab set st=1 where id='$oplab'");
                if($up1>0)
                {
                    header("index.php?success=1");
                }
             }
            }
            else
            {
                header("index.php?success=1");
            }
    }
}
if(isset($_POST['add5']))
{
    $tst=$_POST['tst'];
    $ins_test5=mysql_query("insert into purchase_lab_test values('','".$_SESSION['lab']."','".$_GET['ins']."','0','".$_GET['bar']."','$tst','0','0','0','0')");
    if($ins_test5>0)
    {
        header("location:index.php?dir=".$_GET['dir']."&bar=".$_GET['bar']."&ins=".$_GET['ins']);
    }
}    
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>ME CARD :: <?php echo $r_aut[1] ?> Village</title>

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
		<script src="../authority/assets/js/ace-extra.min.js"></script>

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
                                                            <script type="text/javascript">
                                                                function addtest(x,pid,i,opid,bar,opfld)
                                                                {
                                                                    var xmlhttp = new XMLHttpRequest();
                                                                    xmlhttp.onreadystatechange = function() {
                                                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                                                            document.getElementById("a"+i).innerHTML = xmlhttp.responseText;
                                                                        }
                                                                    };
                                                                    xmlhttp.open("GET", "add_lab.php?tid=" + x+"&pid="+pid+"&opid="+opid+"&bar="+bar+"&opfld="+opfld, true);
                                                                    xmlhttp.send();
                                                                }
                                                            </script>
                                                            <?php
                                                            if(isset($_GET['opid']))
                                                            {
                                                                $sel_data=mysql_query("select * from op_entry,cit_data,abt_hospital where cit_data.bar_code=op_entry.bar_code and abt_hospital.h_id=op_entry.hid and op_entry.id='".$_GET['opid']."' and op_entry.bar_code='".$_GET['bar']."'");
                                                                if(mysql_num_rows($sel_data)>0)
                                                                {
                                                                    $r_data=mysql_fetch_row($sel_data);
                                                                    $sel_md=mysql_query("select * from op_lab where opentry_id='".$_GET['opid']."'");
                                                                if(mysql_num_rows($sel_md)>0)
                                                                {
                                                                    ?>
                                                            <table class="table table-bordered table-hover table-responsive table-striped">
                                                                <tr>
                                                                    <td colspan="2" style="width: 30%;"><center>
                                                                        <img src="../authority/cit_pic/<?php echo $r_data[19] ?>" class="img img-responsive" style="height: 150px;"                                                                        
                                                                </center></td>
                                                                <td colspan="3">
                                                                    <?php echo $r_data[9] ?><br /><?php echo $r_data[16] ?><br /><span class='fa fa-phone'></span><?php echo $r_data[18] ?><hr />D.O.B : <?php echo $r_data[21] ?><BR />Blood Group : <?php echo $r_data[20] ?><br /><BR />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4"><center><strong>TEST REQUIRED</strong></center></td>
                                                            </tr>
                                                            <?php
                                                            if(isset($_GET['ins']))
                                                            {
                                                            $i=1;
                                                            while($r_md=mysql_fetch_row($sel_md))
                                                            {
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <td>
                                                                    <?php
                                                                    $sel_tst=mysql_query("select * from labtest_data where id='$r_md[5]'");
                                                                    $r_tst=mysql_fetch_row($sel_tst);
                                                                    echo $r_tst[1]; 
                                                                    ?><br /><br />
                                                                    <?php
                                                                    $chk_data=mysql_query("select * from purchase_lab_test where test_id='$r_md[0]'");
                                                                    if(mysql_num_rows($chk_data)>0)
                                                                    {
                                                                        ?>
                                                                    <div class="label label-danger">Tested</div>
                                                                    <?php
                                                                    }
                                                                    else
                                                                    {
                                                                    ?>
                                                                    <div id="a<?php echo $i ?>"><input type="checkbox" value="<?php echo $r_md[5] ?>" onclick="addtest(this.value,'<?php echo $_GET['ins'] ?>','<?php echo $i ?>','<?php echo $_GET['opid'] ?>','<?php echo $_GET['bar'] ?>','<?php echo $r_md[0] ?>')" /> <span class="label label-warning">Choose</span></div>
                                                                <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td colspan="2" style="text-align: justify;"><?php echo $r_tst[2];  ?></td>
                                                            </tr>
                                                            <?php
                                                            $i++;
                                                            }                                                            
                                                            }
                                                            else
                                                            {
                                                            $i=1;
                                                            while($r_md=mysql_fetch_row($sel_md))
                                                            {
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <td>
                                                                    <?php
                                                                    $sel_tst=mysql_query("select * from labtest_data where id='$r_md[5]'");
                                                                    $r_tst=mysql_fetch_row($sel_tst);
                                                                    echo $r_tst[1]; 
                                                                    ?>
                                                                </td>
                                                                <td colspan="2" style="text-align: justify;"><?php echo $r_tst[2];  ?></td>
                                                            </tr>
                                                            <?php
                                                            $i++;
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td colspan="4"><form method="post"><input style="float: right;" type="submit" name="sub" class="btn btn-sm btn-success" value="Proceed" /></form></td>
                                                            </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                            </table>
                                                            <?php
                                                                }
                                                            }
                                                            }
                                                            else if(isset($_GET['dir']))
                                                            {
                                                                $sel_c1=mysql_query("select * from cit_data where bar_code='".$_GET['bar']."'");
                                                                $r_c1=mysql_fetch_row($sel_c1);
                                                                ?>
                                                            <form method="post">
                                                            <table class="table table-bordered table-condensed table-hover table-responsive table-responsive">
                                                               <tr>
                                                                    <td style="width: 30%;"><center>
                                                                        <img src="../authority/cit_pic/<?php echo $r_c1[11] ?>" class="img img-responsive" style="height: 150px;"                                                                        
                                                                </center></td>
                                                                <td>
                                                                    <?php echo $r_c1[1] ?><br /><?php echo $r_c1[8] ?><br /><span class='fa fa-phone'></span><?php echo $r_c1[10] ?><hr />D.O.B : <?php echo $r_c1[13] ?><BR />Blood Group : <?php echo $r_c1[12] ?><br /><BR />
                                                                </td>
                                                            </tr>
                                                                <tr>
                                                                    <td>Choose Test</td>
                                                                    <td>
                                                                        <select name="tst" class="form-control" required="required" style="width: 93%; float: left;">
                                                                            <option value="">Choose</option>
                                                                            <?php
                                                                            $sel_tst1=mysql_query("select * from labtest_data order by tst_nme asc");
                                                                            while($r_tst1=mysql_fetch_row($sel_tst1))
                                                                            {
                                                                                ?>
                                                                            <option value="<?php echo $r_tst1[0] ?>"><?php echo $r_tst1[1] ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <input type="submit" name="add5" value="+" class="btn btn-sm btn-success" />
                                                                    </td>
                                                                </tr>
                                                            </table>
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
                                                            </form>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5">
                                                            <h3>Todays Work</h3>
                                                            <?php
                                                            $sel_wrk=mysql_query("select * from purchase_lab where store_id='".$_SESSION['lab']."' and dt='".date('Y-m-d')."'");
                                                            if(mysql_num_rows($sel_wrk)>0)
                                                            {
                                                                ?>
                                                            <script type="text/javascript">
                                                            function  shodetail(x){
                                                                
                                                                $("#"+x).slideToggle(1000);
                                                            }
                                                            </script>
                                                            <table class="table table-bordered table-condensed table-hover table-responsive" id="tbl">
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>Customer Name</td>
                                                                    <td>Test Type</td>
                                                                    <td>More</td>
                                                                </tr>
                                                                <?php
                                                                $i=1;
                                                                while($r_wrk=mysql_fetch_row($sel_wrk))
                                                                {
                                                                    ?>
                                                                <tr>
                                                                    <td><?php echo $i ?></td>
                                                                    <td><?php echo $r_wrk[2] ?></td>
                                                                    <td>
                                                                        <?php
                                                                        if($r_wrk[3]=="0")
                                                                        {
                                                                            echo"Direct";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo"With Prescription";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td><center><span class="glyphicon glyphicon-arrow-down" style="cursor: pointer;" onclick="shodetail('<?php echo $i ?>')"></span></center></td>
                                                                </tr>
                                                                <tr id="<?php echo $i ?>" style="display: none;">
                                                                    <td colspan="4">
                                                                        <table class="table table-bordered" style="margin-top: 10px;">
                                                                <?php
                                                                $sel_l1=mysql_query("select * from purchase_lab_test where pid='$r_wrk[0]'");
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
                                                                    <span class="glyphicon glyphicon-upload" title="Upload File" style="cursor: pointer; color: red;" onclick="shodownload('<?php echo $r_l1[0] ?>')"></span>    
                                                                        <?php
                                                                    }
                                                                    else
                                                                    {
                                                                      ?>
                                                                    <a href="<?php echo"$r_l1[8]/$r_l1[7]" ?>" target="_BLANK"><span class="glyphicon glyphicon-download" title="Download File" style="cursor: pointer; color: green"></span></a>
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
                                                            <script type="text/javascript">
                                                            function shodownload(x)
                                                            {
                                                                $("#tbl").hide(1000);
                                                                
                                                                var xmlhttp = new XMLHttpRequest();
                                                                xmlhttp.onreadystatechange = function() {
                                                                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                                                        document.getElementById("upld").innerHTML = xmlhttp.responseText;
                                                                    }
                                                                };
                                                                xmlhttp.open("GET", "uploader.php?id=" + x, true);
                                                                xmlhttp.send();
                                                          
                                                                $("#upld").show(1000);
                                                            }
                                                            </script>
                                                            <div id="upld">
                                                                
                                                            </div>
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                            <div class="alert alert-danger">No work done today</div>
                                                            <?php
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
		<script src="../authority/assets/js/jquery-2.1.4.min.js"></script>

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
