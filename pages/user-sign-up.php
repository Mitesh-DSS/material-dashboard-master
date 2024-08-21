<?php

include('config.php');

$username = $email = $number = $password = $confirm_password = "";
$username_err = $email_err = $number_err = $password_err = $confirm_password_err = "";

if (isset($_POST['submit'])) {

  // validate username

  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a username.";
  } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
    $username_err = "Username can only contain letters, numbers, and underscores.";
  } else {

    $sql = "SELECT `exp_usr_id` FROM `exp_users` WHERE username = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {

      mysqli_stmt_bind_param($stmt, "s", $param_username);

      $param_username = trim($_POST["username"]);

      if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
          $username_err = "This username is already taken.";
        } else {
          $username = trim($_POST["username"]);
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      mysqli_stmt_close($stmt);
    }
  }

  // validate email

  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter a password.";
  } elseif (strlen(trim($_POST["email"])) < 6) {
    $email_err = "Password must have atleast 6 characters.";
  } else {
    $email = trim($_POST["email"]);
  }

  if (empty(trim($_POST["number"]))) {
    $number_err = "Please enter a mobile number.";
  } else {
    $number = trim($_POST["number"]);
  }

  // validate password

  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "Password must have atleast 6 characters.";
  } else {
    $password = trim($_POST["password"]);
  }

  // validate confrm password

  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm password.";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "Password did not match.";
    }
  }

  if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      $email = $_POST['email'];
    // Prepare the SQL statement
    $stmt = $link->prepare("INSERT INTO `exp_users`(`username`, `email`, `mobile`, `password`) VALUES (?,'$email','$number',?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
      header('location:user-index.php');
    } else {
      echo "Error creating record: " . $link->error;
    }

    // Close the statement and connection
    $stmt->close();
    $link->close();
  }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Expence Management System
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.5" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->

        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div
              class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div
                class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                <div class="card-body">
                  <form role="form" action="" method="post">
                    <div>
                      <label><b>Name</b></label>
                      <input type="text" name="username" class="custom-form-control">
                      <span class="error">
                        <?php echo $username_err; ?>
                      </span>
                    </div>
                    <div>
                      <label><b>Email</b></label>
                      <input type="email" name="email" class="custom-form-control">
                      <span class="error">
                        <?php echo $email_err; ?>
                      </span>
                    </div>
                    <div>
                      <label><b>Mobile Number</b></label>
                      <input type="text" name="number" class="custom-form-control">
                      <span class="error">
                        <?php echo $number_err; ?>
                      </span>
                    </div>
                    <div>
                      <label><b>Password</b></label>
                      <input type="password" name="password" class="custom-form-control">
                      <span class="error">
                        <?php echo $password_err; ?>
                      </span>
                    </div>
                    <div>
                      <label><b>Confirm Password</b></label>
                      <input type="password" name="confirm_password" class="custom-form-control">
                      <span class="error">
                        <?php echo $confirm_password_err; ?>
                      </span>
                    </div>
                    <div class="text-center">
                      <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="submit"
                        value="Sign Up">
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="../pages/user-index.php" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.5"></script>
</body>

</html>