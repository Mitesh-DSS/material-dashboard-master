<?php 

include "config.php"; 

if (isset($_GET['delexpid'])) {

    $user_id = $_GET['delexpid'];

    $sql = "DELETE FROM `exp_records` WHERE `exp_id_auto` = '$user_id'";

     $result = $link->query($sql);

     if ($result == TRUE) {

        header('location: user-view-expence.php');

    }else{

        echo "Error:" . $sql . "<br>" . $link->error;

    }

} 

?>