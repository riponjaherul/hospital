<?php
require_once './view/classes/view.php';
$obj_view = new View();

$total_time_slot = $obj_view->select_total_time_slot(1);
$total_slot_array = array();
while ($row = mysql_fetch_assoc($total_time_slot)) {
    $total_slot_array[] = $row['time_slot_id'];
}
$total_use_time_slot = $obj_view->select_use_time_slot(1);
$total_use_slot_array = array();
while ($row1 = mysql_fetch_assoc($total_use_time_slot)) {
    $total_use_slot_array[] = $row1['time_slot_id'];
}
echo '<pre>';
print_r($total_slot_array);

echo '<pre>';
print_r($total_use_slot_array);

$available_time_slot = array_diff($total_slot_array, $total_use_slot_array);
echo '<pre>';
print_r($available_time_slot);

$remaining_time_slot = $obj_view->remaining_time_slot($available_time_slot);

print_r($remaining_time_slot);
//while ($row3 = mysql_fetch_assoc($remaining_time_slot)) {
//    echo $row3['time_slot_time'];
//}
?>
<select>
    <?php
    foreach ($remaining_time_slot as $time_slot) {
        echo '<option value="'.$time_slot['time_slot_id'].'">'.$time_slot['time_slot_time'].'</option>';
    }
    ?>
</select>

