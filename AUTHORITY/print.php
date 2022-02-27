<?php
ob_start();
include '../connection.php';
session_start();
if(isset($_SESSION['autho']))
{
    $sel_aut=mysql_query("select * from vil_info where lid='".$_SESSION['autho']."'");
    $r_aut=mysql_fetch_row($sel_aut);
    $sel_root=mysql_query("select * from state,district,tal_info,vil_info where state.StCode=district.StCode and district.DistCode=tal_info.d_id and tal_info.id=vil_info.id and vil_info.lid='".$_SESSION['autho']."'");
    $r_root=mysql_fetch_row($sel_root);
    $vid=$r_root[10];
}
else
{
    header("location:../index.php");
}
if(isset($_GET['id']))
{
    $sel_cit=mysql_query("select * from cit_data where id='".$_GET['id']."' and vid='$vid'");
    if(mysql_num_rows($sel_cit)>0)
    {
        $r_cit=mysql_fetch_row($sel_cit);
    }
    else
    {
        header("location:index.php");
    }
}
else
{
    header("location:index.php");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    </head>
    <body>
        <div class="col-md-12 col-lg-12">
                                                       
                                                        <div class="col-md-6 col-lg-7">
                                                            <table class="table table-bordered table-condensed table-hover table-responsive" style="width: 50%">
                                                            <tr>
                                                                <td style="background-color: black; color: white;"><center><h3><b>MEDICAL E CARD IDENTITY</b></h3></center></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td rowspan="6"><center><img src="cit_pic/<?php echo $r_cit[11] ?>" class="img img-responsive" style="width: 150px;" /><br /><?php echo $r_cit[16] ?></center></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><b><?php echo strtoupper($r_cit[1]) ?></b></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><div style="float: left;">
                                                                                <?php echo $r_cit[8] ?>
                                                                                </div>
                                                                                <div>
                                                                                    <center>
                                                                            <iframe src="amr\qrcode.php?id=<?php echo $r_cit[16] ?>" style='border:none; width: 90px; height: 90px;'></iframe>
                                                                            
                                                                            </center>
                                                                                </div>
                                                                            
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Location :<?php echo"$r_root[1]-$r_root[4]-$r_root[8]-$r_root[14]"; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>D.O.B : <?php echo $r_cit[13] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Blood Group : <?php echo $r_cit[12] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="3">
                                                                                Physical Status : <?php echo $r_cit[14].",".$r_cit[15] ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr style="background-color: black; color:yellow; text-align: right;">
                                                                        <td colspan="3">
                                                                            ISSUED BY :: DEPARTMENT OF MEDICINE
                                                                        </td>   
                                                                    </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                            
                                                    </div><!-- /.col -->
						</div>
        
    </body>
</html>
<script>
    //window.print();
    </script>
