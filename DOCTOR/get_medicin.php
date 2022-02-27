<?php
include '../connection.php';
$d=$_GET['d'];
$sel_m=mysql_query("select * from medicin_data where dep='$d' and st=1");
if(mysql_num_rows($sel_m)>0)
{
   ?>
 <select name="mdcn" class="form-control">
    <option>Choose Medicine</option>
    <?php
    while($r_m=mysql_fetch_row($sel_m))
    {
        ?>
    <option value="<?php echo $r_m[0] ?>"><?php echo $r_m[2] ?> (<?php echo $r_m[4] ?>)</option>
    <?php
    }
    ?>
</select>
<?php
}
else
{
    ?>
 <select name="mdcn" class="form-control">
    <option>Choose Medicine</option>
</select>
<?php
}
?>