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
if(isset($_GET['id']))
{
    $id=$_GET['id'];
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
    </head>
    <body>
        <?php
        $sel_fit=mysql_query("select * from fitnes where doc_id='".$_SESSION['doc']."' and id='$id'");
             if(mysql_num_rows($sel_fit)>0)
             {
                 $r_fit=mysql_fetch_row($sel_fit);
                 ?>
    <center>
         
        <h3>MEDICAL FITNESS CERTIFICATE</h3>
(To be signed by a registered medical practitioner holding a degree not below that of M.B.B.S.)<br /><br /><br />
<h4>(TO BE SUBMITTED AT THE TIME OF ADMISSION)</h4>
(Refer Information Brochure 2011-2012)<br /><br />
I  certify that I have carefully examined Mr./Ms.* _______<u><?php echo $r_fit[3] ?></u>_________ son/daughter of Shri ____<u><?php echo $r_fit[4] ?></u>___________ whose signature is given below. Based on the examination, I certify that he/she is in good mental and physical health and is free from any physical defects which may interfere with his/her studies including the active outdoor duties required of a professional.
<br /><br /><br />
</center>
Marks of Identification _________<u><?php echo $r_fit[7] ?></u>__________ <br /><br /><br />
Signature of the Candidate _________________________________________ 
<br /><br />
Place:<br />
Date: <?php echo $r_fit[8] ?>
<br />
<br />
<div style="float: right; width: 300px; text-align: center">
Name & signature of the Medical Officer with seal and registration number 
</div>
    
        <?php
             }
             else
             {
                 echo "Invalid Data";
             }
        ?>
    </body>
</html>
<?php
}
?>
<script>
    window.print();
    </script>