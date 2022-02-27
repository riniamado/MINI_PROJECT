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
$x=$_GET['x'];
$qty=$_GET['qty'];
$pid=$_GET['pid'];
$bar=$_GET['bar'];
$mid=$_GET['mid'];
$up=mysql_query("update op_medicine set qty_get=qty_get+$qty where id='$x'");
if($up>0)
{
    $ins=  mysql_query("insert into purchase_medicine_data values('','".$_SESSION['mstore']."','$pid','$bar','$mid','$qty')");
    if($ins>0)
    {
        echo "Done";
    }
}