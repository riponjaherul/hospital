<?php
require_once '../../classes/admin.php';
$obj_admin = new Admin();

$value_id = intval($_GET['value_id']);
$break = "<br>";
?>
<div class="form-group">
    <div class="checkbox">
        <label>
            <?php
            $select_test_by_category = $obj_admin->select_test_by_category($value_id);
            while ($row = mysql_fetch_assoc($select_test_by_category)) {
                ?>
            <input type="checkbox" name="test_id[]" value="<?php echo $row['test_id']; ?>"/>
            <?php 
                echo $row['test_name'].$break;
            } ?>
        </label>
    </div>
</div>

<?php 
 echo $value = $_GET['text'];

