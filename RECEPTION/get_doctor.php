<?php
include '../connection.php';
$d=$_GET['d'];
$h=$_GET['h'];
$sel_doc=mysql_query("select * from doc_data where h_id='$h' and dep='$d'");
if(mysql_num_rows($sel_doc)>0)
{
    ?>
<select name="doc" class="form-control" required="required">
    <option value="">Choose Doctor</option>
    <?php
    while($r_d=mysql_fetch_row($sel_doc))
    {
      ?>
    <option value="<?php echo $r_d[3] ?>"><?php echo $r_d[2] ?></option>
    <?php
    }
    ?>
</select>
<?php
    
}
else
{
  ?>
<select name="doc" class="form-control" required="required">
    <option value="">Choose Doctor</option>
</select>
<?php
}
?>