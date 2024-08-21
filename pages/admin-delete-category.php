<?php

include_once('config.php');

$delete_cat = $_GET['deletecatid'];

$sql = "DELETE FROM `category_table` WHERE `cat_id`='$delete_cat'";
if (mysqli_query($link, $sql)) {
    header('location: admin-add-category.php');
} else {
    echo "ERROR: Could not able to execute $sql. "
        . mysqli_error($link);
}

?>