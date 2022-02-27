<?php
include '../connection.php';
$s=$_GET['s'];
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
    $sel_cit=mysql_query("select * from cit_data where sid='$s' order by id desc");
    if(mysql_num_rows($sel_cit)>0)
    {
        ?>
    <table  class="table table-bordered table-condensed table-hover table-responsive">
        <tr>
            <td>#</td>
            <td>Citizen Name</td>
            <td>Address</td>
            <td>Contact</td>
            <td>More</td>
        </tr>
        <?php
        $i=1;
        while($r_cit=mysql_fetch_row($sel_cit))
        {
            ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $r_cit[1] ?>
            <br />D.O.B : <?php echo $r_cit[13] ?><br />Blood Group : <?php echo $r_cit[12] ?>
            </td>
            <td><?php echo $r_cit[8] ?><br />PIN:<?php echo $r_cit[9] ?></td>
            <td><?php echo $r_cit[10] ?></td>
            <td><a target="_BLANK" href="print.php?id=<?php echo $r_cit[0] ?>" title="Print Card"><span class="glyphicon glyphicon-print" style="color: green;"></span></a><br />
                <a target="_BLANK" href="admin_report.php?id=<?php echo $r_cit[16] ?>" title="Medical Report"><span class="glyphicon glyphicon-file"></span></a>
            </td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </table>
    <?php
    }
    else
    {
        ?><center>
        <img src="logo/no-record-found.gif" class="img img-responsive" />
    </center>
        <?php
    }
    ?>
    </body>
</html>
