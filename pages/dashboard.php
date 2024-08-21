<?php

include_once('config.php');

// credit

$query = "SELECT SUM(expamount) AS `expamount` FROM `exp_records`WHERE `exptype` = 'Credit'";


// debit
$debit_query = "SELECT SUM(expamount) AS `expamount` FROM `exp_records`WHERE `exptype` = 'Debit'";


?>

<?php include_once('header.php'); ?>

<?php include_once('sidebar.php'); ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

  <?php include('nav.php'); ?>

  <div class="container-fluid dash-img">
    <div class="row">
    </div>
    <div class="row mt-4">
      <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2 ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
              <div class="chart d-flex align-items-center">
                <div>
                  <h3 class="text-white text-center">Total Credit</h3>
                  <h4 class="text-white text-center">
                    <?php

                    if ($result = $link->query($query)) {
                      // Fetch the result row as an associative array
                      $row = $result->fetch_assoc();
                      // Get the sum value from the row
                      $sum = $row['expamount'];
                      // Print the sum
                      echo $sum;
                      // Free the result set
                      $result->free();
                    } else {
                      // Handle query errors
                      echo 'Error: ' . $link->error;
                    }

                    ?>
                  </h4>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 ">Total Credit</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2 ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-success shadow-primary border-radius-lg py-3 pe-1">
              <div class="chart d-flex align-items-center">
                <div>
                  <h3 class="text-white text-center">Total Debit</h3>
                  <h4 class="text-white text-center">
                    <?php

                    if ($debit_result = $link->query($debit_query)) {
                      // Fetch the result row as an associative array
                      $debit_row = $debit_result->fetch_assoc();
                      // Get the sum value from the row
                      $debit_sum = $debit_row['expamount'];
                      // Print the sum
                      echo $debit_sum;
                      // Free the result set
                      $debit_result->free();
                    } else {
                      // Handle query errors
                      echo 'Error: ' . $link->error;
                    }

                    ?>
                  </h4>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 ">Total Debit</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2 ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-dark shadow-primary border-radius-lg py-3 pe-1">
              <div class="chart d-flex align-items-center">
                <div>
                  <h3 class="text-white text-center">Total Balance</h3>
                  <h4 class="text-white text-center">
                    <?php
                      if ($result = $link->query($query) and $debit_result = $link->query($debit_query)) {

                        $row = $result->fetch_assoc();
                        $sum = $row['expamount'];

                        $debit_row = $debit_result->fetch_assoc();
                        $debit_sum = $debit_row['expamount'];

                        $diffrance = $sum - $debit_sum;

                        echo $diffrance;
                      }
                    ?>
                  </h4>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 ">Total Balance</h6>
          </div>
        </div>
      </div>
    </div>
    <?php include_once('footer.php'); ?>