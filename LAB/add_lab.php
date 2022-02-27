<?php
include '../connection.php';
session_start();
$tid=$_GET['tid'];
$opid=$_GET['opid'];
$pid=$_GET['pid'];
$bar=$_GET['bar'];
$opfld=$_GET['opfld'];
$ins=mysql_query("insert into purchase_lab_test values('','".$_SESSION['lab']."','$pid','$opid','$bar','$tid','$opfld','0','0','0')");
if($ins>0)
{
    echo"<span class='label label-success'>Done</span>";
}
?>