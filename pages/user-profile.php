<?php

require_once "config.php";

session_start();
error_reporting(0);
$user_id = $_SESSION['exp_usr_id'];

$query = "SELECT * FROM `exp_users` WHERE `exp_usr_id`='$user_id'";
$result = mysqli_query($link, $query);


?>

<?php include_once('header.php'); ?>

<?php include_once('user-sidebar.php'); ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php include('nav.php'); ?>

    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <?php

            if (mysqli_num_rows($result) > 0) {
                // OUTPUT DATA OF EACH ROW
                while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <div class="row gx-4 mb-2 profile-shadow">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="../assets/img/bruce-mars.jpg" alt="profile_image"
                                    class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    <?php echo $row['username'];   ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0">Profile Information</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                    class="text-dark">Full Name:</strong>&nbsp;<?php echo $row['username'];   ?></li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Email:</strong> &nbsp; <?php echo $row['email'];   ?></li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Mobile Number:</strong> &nbsp; <?php echo $row['mobile'];   ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php }
            } ?>
        </div>
    </div>
    <?php include_once('footer.php'); ?>