<?php
include '../connection.php';
$id=$_GET['id'];
$lab=mysql_query("select * from labtest_data where id='".$_GET['id']."'");
$r=  mysql_fetch_row($lab);
echo "<br /><p align='justify'>$r[2]</p>";
?>