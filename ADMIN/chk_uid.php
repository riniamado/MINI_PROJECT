<?php
include '../connection.php';
$x=$_GET['x'];

$chk_nme=mysql_query("select * from usr_log where uid like '%$x'");
if(mysql_num_rows($chk_nme)>0)
{
    echo "1";
}
else
{
    echo "0";
}
?>