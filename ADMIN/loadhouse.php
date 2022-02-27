<?php
include '../connection.php';
$s=$_GET['s'];
$d=$_GET['d'];
$t=$_GET['t'];
$v=$_GET['v'];
$w=$_GET['w'];
$sel_district=mysql_query("select distinct hse_num from cit_data where sid='$s' and did='$d' and tid='$t' and vid='$v' and ward_num='$w'");
if(mysql_num_rows($sel_district)>0)
{
    ?>
<select name="hnum" class="form-control" required="required" style="width: 50%; float: left;" onchange="load_hcit(this.value,'<?php echo $s ?>','<?php echo $d ?>','<?php echo $t ?>','<?php echo $v ?>','<?php echo $w ?>')">
<option value="">Choose One</option>
<?php
while($r_district=mysql_fetch_row($sel_district))
{
    ?>
<option value="<?php echo $r_district[0] ?>"><?php echo $r_district[0] ?></option>
<?php
}
?>
</select>
<?php
}
else{
    ?>
<select name="hnum" class="form-control" style="width: 50%; float: left;" required="required">
<option value="">Choose One</option> 
  </select>
<?php
}
?>