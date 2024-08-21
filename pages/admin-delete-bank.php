<?php

include_once('config.php');

$delete_bank_id = $_GET['deletebankid'];

$sql = "DELETE FROM `bank_table` WHERE `bank_id`='$delete_bank_id'";
if (mysqli_query($link, $sql)) {
    header('location: admin-add-bank.php');
} else {
    echo "ERROR: Could not able to execute $sql. "
        . mysqli_error($link);
}
mysqli_close($link);

?>