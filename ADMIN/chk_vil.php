<?php
include '../connection.php';
$x=$_GET['x'];
$s=$_GET['s'];
$d=$_GET['d'];
$t=$_GET['t'];

$chk_nme=mysql_query("select * from vil_info where sid='$s' and did='$d' and tid='$t' and v_nme like '%$x%'");
if(mysql_num_rows($chk_nme)>0)
{
    echo "1";
}
else
{
    echo "0";
}
?>