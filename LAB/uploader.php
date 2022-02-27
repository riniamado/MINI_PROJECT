<?php
include '../connection.php';
$id=$_GET['id'];
$sel_tst=mysql_query("select * from purchase_lab_test where id='$id'");
$r_tst=  mysql_fetch_row($sel_tst);
?>
<form method="post" enctype="multipart/form-data">
<table class="table table-bordered table-condensed">
    <tr>
        <td>User Code</td>
        <td><?php echo $r_tst[4] ?>
            <input type="hidden" name="oplab" value="<?php echo $r_tst[6] ?>" />
            <input type="hidden" name="id" value="<?php echo $r_tst[0] ?>" />
        </td>
    </tr>
    <tr>
        <td>Required Test</td>
        <td style="text-align: justify">
            <?php
            $sel_tst=mysql_query("select * from labtest_data where id='$r_tst[5]'");
            $r_tst=  mysql_fetch_row($sel_tst);
            echo "<strong>$r_tst[1]</STRONG><br />$r_tst[2]";
            ?>
        </td>
    </tr>
    <tr>
        <td>File Type</td>
        <td><select name="rtyp" class="form-control">
            <option>Choose Report Type</option>
            <option value="1">Image</option>
            <option value="2">Audio</option>
            <option value="3">Video</option>
        </select></td>
    </tr>
    <tr>
        <td>Report</td>
        <td><input type="file" name="up" class="form-control" /></td>
    </tr>
    <tr>
        <td colspan="2"><center><input type="submit" name="add_rpt" value="ADD REPORT" class="btn-sm btn-success" /></center></td>
    </tr>
</table>
</form>