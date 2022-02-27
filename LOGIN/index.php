<?php
ob_start();
include '../connection.php';
if(isset($_POST['login']))
{
    $uid=$_POST['log_uid'];
    $pas=$_POST['log_pas'];
    $sel_login=mysql_query("select * from usr_log where uid='$uid' and pas='$pas' and st=1");
    if(mysql_num_rows($sel_login)>0)
    {
        session_start();
        $r_login=mysql_fetch_row($sel_login);
        if($r_login[3]=="admin")
        {
            $_SESSION['adm']="admin";
            header("location:../admin/index.php");
        }
        if($r_login[3]=="authority")
        {
            $_SESSION['autho']=$uid;
            header("location:../authority/index.php");
        }
        if($r_login[3]=="1")
        {
            if($r_login[4]==0)
            {
                header("location:index.php?error=2");
            }
            if($r_login[4]==1)
            {
                $_SESSION['hos']=$uid;
                header("location:../hospital/index.php");
            }
            if($r_login[4]==2)
            {
                header("location:index.php?error=3");
            }
        }
        if($r_login[3]=="2")
        {
            if($r_login[4]==0)
            {
                header("location:index.php?error=2");
            }
            else
            {
                $_SESSION['mstore']=$uid;
                header("location:../mstore/index.php");
            }
        }
        if($r_login[3]=="3")
        {
            if($r_login[4]==0)
            {
                header("location:index.php?error=2");
            }
            else
            {
                $_SESSION['lab']=$uid;
                header("location:../lab/index.php");
            }
        }
        if($r_login[3]=="rec")
        {
            $_SESSION['rec']=$uid;
            header("location:../receptionist/index.php");
        }
        if($r_login[3]=="aprm")
        {
            $_SESSION['aprm']=$uid;
            header("location:../aprm/index.php");
        }
        if($r_login[3]=="doc")
        {
            $_SESSION['doc']=$uid;
            header("location:index1.php");
            //header("location:../doctor/index.php");
        }
    }
    else
    {
        header("location:index.php?error=1");
    }
}
if(isset($_POST['add_org']))
{
    $on=$_POST['on'];
    $oun=$_POST['oun'];
    $opas=$_POST['opas'];   
    $otyp=$_POST['otyp'];
    $stat=$_POST['stat'];
    $dist=$_POST['dist'];
    $taluk=$_POST['taluk'];
    $village=$_POST['village'];
    $ins_org=mysql_query("insert into org_data values('','$on','$oun','no','no','0','0','$stat','$dist','$taluk','$village','$otyp','0')");
    $insid=  mysql_insert_id();
    if($ins_org>0)
    {
        $ins_log=mysql_query("insert into usr_log values('','$oun','$opas','$otyp','0')");
        if($ins_log>0)
        {
            header("location:index.php?success=1&ins=$insid");
        }
    }
    
}
if(isset($_POST['up_org']))
{
    $oem=$_POST['oem'];
    $oaddr1=$_POST['oaddr'];
    $oaddr=nl2br($oaddr1);
    $ocon=$_POST['ocon'];
    $omob=$_POST['omob'];  
    $up_org=mysql_query("update org_data set em='$oem',addr='$oaddr',con='$ocon',mob='$omob' where id='".$_GET['ins']."'");
    if($up_org>0)
    {
        
            header("location:index.php?success=2");
       
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - ME_Card</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">ME</span>
									<span class="white" id="id-text2">CARD</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Medical Department</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
                                                                                    <?php
                                                                                                        if(isset($_GET['success']))
                                                                                                        {
                                                                                                            if($_GET['success']==1)
                                                                                                            {
                                                                                                                $sel_h=mysql_query("select * from org_data where id='".$_GET['ins']."'");
                                                                                                                $r_h=mysql_fetch_row($sel_h);
                                                                                                                ?>
                                                                                    <div class="alert alert-success">
                                                                                        Welcome <b><?php echo $r_h[1] ?></b>, Please Complete the Registration Process....
                                                                                          </div>
                                                                                    <form method="post" enctype="multipart/form-data">
                                                                                       <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                                                                                    <input type="email" name="oem" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-globe"></i>
														</span>
                                                                                       </label>
                                                                                     <label class="block clearfix">
                                                                                                                <span class="block input-icon input-icon-right">
                                                                                                                    <textarea name="oaddr" class="form-control" placeholder="Address"></textarea>
															<i class="ace-icon fa fa-envelope"></i>
														</span>
											</label> 
                                                                                    <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                                                                                    <input type="text" name="ocon" class="form-control" placeholder="Contact" />
															<i class="ace-icon fa fa-phone"></i>
														</span>
                                                                                       </label>
                                                                                    <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                                                                                    <input type="text" name="omob" class="form-control" placeholder="Mobile" />
															<i class="ace-icon fa fa-mobile-phone"></i>
														</span>
                                                                                       </label>
                                                                                   
                                                                                    <div class="clearfix">														
                                                                                                       <input type="submit" name="up_org" class="btn btn-success" value="Complete Registration" />
											</div>
                                                                                        </form>
                                                                                    <?php
                                                                                                            }
                                                                                                            if($_GET['success']==2)
                                                                                                            {
                                                                                                                ?>
                                                                                    <div class="alert alert-success" style="text-align: justify">
                                                                                    Your Registration Process Completed Successfully!!! Please be patient for Administrator Approval.
                                                                                    </div>
                                                                                        
                                                                                        <a href="index.php" class="btn btn-warning">BACK</a>
                                                                                    <?php
                                                                                                            }                                                                                                           
                                                                                                        }
                                                                                                        else
                                                                                                        {
                                                                                                        ?>
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Enter Login Information
											</h4>

											<div class="space-6"></div>

											
												<fieldset>
                                                                                                    <form method="post">                                                                                                        
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                                                                                    <input type="text" name="log_uid" class="form-control" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                                                                                    <input type="password" name="log_pas" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														

                                                                                                            <input type="submit" class="width-35 pull-right btn btn-sm btn-primary" name="login" value="Login Here">
															
														</button>
													</div>
                                                                                                        <b><font color="red">
                                                                                                        <?php
                                                                                                        if(isset($_GET['error']))
                                                                                                        {
                                                                                                            if($_GET['error']==1)
                                                                                                            {
                                                                                                                echo"Invalid User Credentials";
                                                                                                            }
                                                                                                            if($_GET['error']==2)
                                                                                                            {
                                                                                                                echo"Please wait... Your Account Not yet Verified...";
                                                                                                            }
                                                                                                            if($_GET['error']==3)
                                                                                                            {
                                                                                                                echo"Login Blocked by Administrator";
                                                                                                            }
                                                                                                        }
                                                                                                        ?></font></b>
													<div class="space-4"></div>
                                                                                                   
                                                                                                    </form>
												</fieldset>
											
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
											

											<div class="space-6"></div>

											
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													I forgot my password
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													I want to register
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Retrieve Password
											</h4>

											<div class="space-6"></div>
											<p>
												Enter your email and to receive instructions
											</p>

											
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Send Me!</span>
														</button>
													</div>
												</fieldset>
										
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												Back to login
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->

								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-building blue"></i>
												New Organization Registration
											</h4>

											
                                                                                    <form method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                                                                                    <input type="text" class="form-control" name="on" placeholder="Organization Name" required="required" />
															<i class="ace-icon fa fa-home"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                                                                                    <input type="text" class="form-control" name="oun" placeholder="Username" required="required" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                                                                                    <input type="password" class="form-control" name="opas" placeholder="Password" required="required" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>													
                                                                                                    
                                                                                                    <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                                                                                    <select name="otyp" class="form-control" required="required">
                                                                                                                        <option value="">Organization Type</option>
                                                                                                                        <option value="1">Hospital</option>
                                                                                                                        <option value="2">Medical Store</option>
                                                                                                                        <option value="3">Laboratories</option>
                                                                                                                    </select>
															<i class="ace-icon fa fa-ambulance"></i>
														</span>
													</label>
                                                                                                    <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                                                                                    <select name="stat" class="form-control" required="required" onchange="loaddistrict(this.value)">
                                                                                                                        <option value="">Choose One</option>
                                                                                                                        <?php
                                                                                                                        $sel_state=mysql_query("select * from state");
                                                                                                                        while($r_state=mysql_fetch_row($sel_state))
                                                                                                                        {
                                                                                                                            ?>
                                                                                                                        <option value="<?php echo $r_state[0] ?>"><?php echo $r_state[1] ?></option>
                                                                                                                       <?php
                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    </select>
															<i class="ace-icon fa fa-globe"></i>
														</span>
                                                                                                        <script type="text/javascript">
                                                                                                            function loaddistrict(x)
                                                                                                            {
                                                                                                                var xmlhttp = new XMLHttpRequest();
                                                                                                                 xmlhttp.onreadystatechange = function() {
                                                                                                                     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                                                                                                         document.getElementById("dis").innerHTML = xmlhttp.responseText;
                                                                                                                     }
                                                                                                                 };
                                                                                                                 xmlhttp.open("GET", "load_district.php?x=" + x, true);
                                                                                                                 xmlhttp.send();
                                                                                                            }
                                                                                                         </script>
													</label>
													<label class="block clearfix">
														<span id="dis">
                                                                                                                    <select name="dist" class="form-control" required="required">
                                                                                                                    <option value="">Choose One</option>
                                                                                                                    </select>
                                                                                                                </span>
                                                                                                            <script type="text/javascript">
                                                                                                            function loadtaluk(x)
                                                                                                            {
                                                                                                                var xmlhttp = new XMLHttpRequest();
                                                                                                                 xmlhttp.onreadystatechange = function() {
                                                                                                                     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                                                                                                         document.getElementById("tal").innerHTML = xmlhttp.responseText;
                                                                                                                     }
                                                                                                                 };
                                                                                                                 xmlhttp.open("GET", "load_taluk.php?x=" + x, true);
                                                                                                                 xmlhttp.send();
                                                                                                            }
                                                                                                         </script>
													</label>
                                                                                                    <label class="block clearfix">
														<span id="tal">
                                                                                                                    <select name="taluk" class="form-control" required="required">
                                                                                                                    <option value="">Choose One</option>
                                                                                                                    </select>
                                                                                                                </span>
                                                                                                        <script type="text/javascript">
                                                                                                            function loadvillage(x)
                                                                                                            {
                                                                                                                var xmlhttp = new XMLHttpRequest();
                                                                                                                 xmlhttp.onreadystatechange = function() {
                                                                                                                     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                                                                                                         document.getElementById("vil").innerHTML = xmlhttp.responseText;
                                                                                                                     }
                                                                                                                 };
                                                                                                                 xmlhttp.open("GET", "load_village.php?x=" + x, true);
                                                                                                                 xmlhttp.send();
                                                                                                            }
                                                                                                         </script>
													</label>
                                                                                                    <label class="block clearfix">
														<span id="vil">
                                                                                                                    <select name="village" class="form-control" required="required">
                                                                                                                    <option value="">Choose One</option>
                                                                                                                    </select>
                                                                                                                </span>
                                                                                                    </label>													

													<div class="clearfix">														
                                                                                                           
														
                                                                                                            <input type="submit" name="add_org" class="btn btn-success" value="Register Now" />
															
														
													
														
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
                                                                <a href="../index.php">Home</a>
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
