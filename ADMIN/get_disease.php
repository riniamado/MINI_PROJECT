<?php
include '../connection.php';
$dep=$_GET['d'];
?>
<h3>Available Departments</h3>
<?php
$sel_dep=mysql_query("select * from disease_data where dep='$dep'");
if(mysql_num_rows($sel_dep)>0)
{
    ?>
<table class="table table-bordered table-hover table-responsive table-striped">
    <tr>
        <td>#</td>
        <td>Disease</td>
        <td>More</td>
    </tr>
    <?php
    $i=1;
    while($r_dep=mysql_fetch_row($sel_dep))
    {
        ?>
    <tr>
        <td><?php echo $i ?></td>
        <td>
            <b> <?php echo $r_dep[2] ?></b>
            <p><?php echo $r_dep[3] ?></p>
        </td>
        <td><a href="add_disease.php?del=<?php echo $r_dep[0] ?>"><span class="glyphicon glyphicon-trash" style="color:red;"></span></a></td>
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
    echo"No Data Available";
}
?>