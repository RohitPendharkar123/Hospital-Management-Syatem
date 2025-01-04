<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) 
{
  $name = $_POST ['name'];
  $email = $_POST ['email'];
  $subject = $_POST ['subject'];
  $number = $_POST ['number'];
  $Department = $_POST ['Department'];
  $date = $_POST ['date'];
  $Time = $_POST ['Time'];

$sql = "INSERT INTO appointments (name , email , subject , number , Department , date , Time) 
Values ('$name' , '$email' , '$subject' , '$number' , '$Department' , '$date' , '$Time')";


$stmt = mysqli_prepare($conn, $sql);

if ($stmt === false) {
  die('MySQL error: ' . mysqli_error($conn));
}

if (mysqli_stmt_execute($stmt)) {
  echo "<script>alert('Registration successful!')</script>";
} else {
  echo "<script>alert('Registration failed: " . mysqli_error($conn) . "');</script>";
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

}
?>





<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo-removebg-preview.png" />
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
   <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.php" class="text-nowrap logo-img">
          <img src="../assets/images/logos/seodashlogo-removebg-preview.png" class="img-thumbnail" alt="Max-width 100%" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
       

        <?php
          include 'sidebar.php';

         ?>
  
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <?php
      include 'header.php';
      ?>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="card w-100">
        <form onsubmit="showMsg(0);return false;" method="post" class="needs-validation" novalidate>
    <div class="row g-3">

    <hr style="border-top: 5px solid green;">
    <h1 style="text-align: center;">Appointment</h1> 
    <hr style="border-top: 5px solid green;">
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="name" id="name" required>
                <div class="invalid-feedback">Please enter your name.</div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                <input type="email" class="form-control" name="email" id="email" required>
                <div class="invalid-feedback">Please enter a valid email.</div>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="subject" class="form-label">Purpose Of Appointment</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fa fa-tag"></i></span>
            <input type="text" class="form-control" name="subject" id="subject" required>
            <div class="invalid-feedback">Please specify the purpose of the appointment.</div>
        </div>
    </div>

    <div class="mb-3">
        <label for="number" class="form-label">Mobile Number</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fa fa-phone"></i></span>
            <input type="text" class="form-control" name="number" id="number" required>
            <div class="invalid-feedback">Please enter your mobile number.</div>
        </div>
    </div>

    <div class="mb-3">
        <label for="department" class="form-label">Select Department</label>
        <select class="form-select" name="Department" id="department" required>
            <option value="" disabled selected>Select Department</option>
            <option>Cardiology</option>
            <option>Dermatology and Cosmetology</option>
            <option>General Surgery</option>
            <option>Health Checkup Packages</option>
            <option>Neurology</option>
        </select>
        <div class="invalid-feedback">Please select a department.</div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <label for="date" class="form-label">Select Date</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                <input type="date" class="form-control" name="date" id="date" required>
                <div class="invalid-feedback">Please select a date.</div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="time" class="form-label">Select Time</label>
            <select class="form-select" name="Time" id="time" required>
                <option value="" disabled selected>Select Time</option>
                <option>8 AM - 10 AM</option>
                <option>10 AM - 12 PM</option>
                <option>12 PM - 2 PM</option>
                <option>2 PM - 4 PM</option>
                <option>4 PM - 6 PM</option>
                <option>6 PM - 8 PM</option>
                <option>8 PM - 10 PM</option>
            </select>
            <div class="invalid-feedback">Please select a time slot.</div>
        </div>
    </div>

    <div class="alert alert-success mt-3 d-none successBox" role="alert">
        <button type="button" class="btn-close" onclick="showMsg(1);"></button>
        <strong>Congratulations!</strong> Your appointment has been booked successfully.
    </div>

    <div class="mt-3">
    <button type="submit" name="submit" class="btn btn-primary">Send message</button>

    </div>
</form>

<script>
    // Bootstrap validation script
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })();
</script>

        </div>
        
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>