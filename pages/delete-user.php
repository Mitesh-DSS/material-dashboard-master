<?php 

include "config.php"; 

if (isset($_GET['delid'])) {

    $user_id = $_GET['delid'];

    $sql = "DELETE FROM `users` WHERE `id`='$user_id'";

     $result = $link->query($sql);

     if ($result == TRUE) {

        header('location: tables.php');

    }else{

        echo "Error:" . $sql . "<br>" . $link->error;

    }

} 

?>