<?php
ob_start();
include '../connection.php';
session_start();
$doc=$_SESSION['doc'];
$sel_stf=mysql_query("select * from doc_data where em='".$_SESSION['doc']."'");
$r_stf=mysql_fetch_row($sel_stf); 
$t=null;
if(isset($_POST['sub']))
{
    $up=$_FILES['up']['name'];
    $ex=  strrpos($up, ".");
    $ext=substr($up,$ex);
    $nfn="$doc$ext";
    $ins=mysql_query("insert into temp_thumb values('','$doc','$nfn','1')");
    if($ins>0)
    {
        if(move_uploaded_file($_FILES['up']['tmp_name'], getcwd()."\\temp_thumb\\$nfn"))
            {
                $new_file="temp_thumb\\$nfn";
                $realfile="..\\hospital\\doctor_fp\\$r_stf[5]";
                $image11 = file_get_contents($realfile);
                $image22 = file_get_contents($new_file);
                if ($image11 == $image22) {
                    $del=mysql_query("delete from temp_thumb where uid='$doc'");
                    if(unlink("temp_thumb\\$nfn"))
                    {
                        $t=1;
                        header("Refresh: 5;url=../doctor/index.php");
                        //header("location:../doctor/index.php");
                    }                    
                }
                else {
                    $del=mysql_query("delete from temp_thumb where uid='$doc'");
                    if(unlink("temp_thumb\\$nfn"))
                    {
                        $t=1;
                        header("Refresh: 5;url=index1.php?error=2");
                        //header("location:");
                    }
                    
                }
            }
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
                                                                                echo "Welcome $r_stf[2]";
                                                                                ?><br /><br />
                                                                                <form method="post" enctype="multipart/form-data">
                                                                                <table class="table table-bordered table-condensed table-hover table-responsive">
                                                                                    <tr>
                                                                                        <td><b><center>FINGER PRINT VERIFICATION</center></b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <?php
                                                                                            if(isset($t))
                                                                                            {
                                                                                                ?>
                                                                                            <img src="../hospital/doctor_fp/logo.gif" class="img img-thumbnail img-responsive" />
                                                                                            <?php
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                                ?>
                                                                                            <img src="../hospital/doctor_fp/fingerprintreader.jpg" class="img img-thumbnail img-responsive" />
                                                                                            <?php                                                                                                
                                                                                            }
                                                                                            ?>
                                                                                            </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <?php
                                                                                        if(isset($t))
                                                                                        {
                                                                                           ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                        <?php
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                        if(isset($_GET['error']))
                                                                                        {                                                                                            
                                                                                            echo "<tr><td><center><font color='red'>Fingerprint Mismatch.. Try Again..</font></center></td></tr>";
                                                                                        }
                                                                                        ?>
                                                                                    <td>
                                                                                        <input type="file" name="up" class="form-control" />
                                                                                    </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><center><input type="submit" name="sub" value="Verify Now" class="btn btn-warning" /></center></td>
                                                                                    </tr>
                                                                                    <?php
                                                                                        }
                                                                                        ?>
                                                                                </table>
                                                                                    <?php
                                                                                    
                                                                                    ?>
                                                                                    </form>
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
