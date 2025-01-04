<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo-removebg-preview.png" />
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    /* Custom Styling */
form .form-group {
    margin-bottom: 20px;
}

input[type="date"] {
    border-radius: 5px;
    border: 1px solid #ccc;
}

button[type="submit"] {
    font-size: 16px;
    padding: 10px;
    border-radius: 5px;
}

  </style>
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
        <div class="card">
         
        <div class="container">
 <div class="col-md-12">
   
    
     <div class="card mt-5">
     <div class="card-header">
    <h4>Filter the record of appointment users</h4>
    </div>
    <form method="POST" action="#" class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="form-group">
                <label for="start_date">Select Start Date</label>
                <input type="date" name="start_date" id="start_date" placeholder="Select date" class="form-control" value="<?php if (isset($_POST['start_date'])){ echo $_POST['start_date']; } ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="end_date">Select End Date</label>
                <input type="date" name="end_date" id="end_date" placeholder="Select date" class="form-control" value="<?php if (isset($_POST['end_date'])){ echo $_POST['end_date']; } ?>">
            </div>
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <div class="form-group text-center w-100">
                <button type="submit" class="btn btn-primary w-100" name="submit">Filter</button>
            </div>
        </div>
    </div>
</form>



    </div>
 </div>
 </div>

<div class="card mt-4">
    <div class="card-body">
    <table class="table table-bordered table-striped">
          <thead>
            <tr>
            <th> Sr.no </th>        
           <th>Name</th>
           <th>Email</th>
           <th>Subject</th>
           <th>Number</th>
           <th>Department</th>
           <th>Date</th>
           <th>Time</th> 
             <th>Action</th>
           </tr>      
          </thead>
          <tbody>
          <?php
include 'config.php';

if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "SELECT * FROM appointments WHERE date BETWEEN '$start_date' AND '$end_date'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
            ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['subject']; ?></td>
                <td><?= $row['number']; ?></td>
                <td><?= $row['Department']; ?></td>
                <td><?= $row['date']; ?></td>
                <td><?= $row['Time']; ?></td>
                <td>
  <button class="btn btn-danger" ><a href="delete.php? deleteid='.$id.'" class="text-light" >Delete</a></button>
  <button class="btn btn-primary" name="aprove"><a href="aprove.php?" class="text-light">Aprove</a></button>
</td>

             </tr>
            
            <?php 
        }
    } else {
        echo "No appointments found.";
    }
} else {
    echo "Please provide both start and end dates.";
}
?>

          </tbody>
    </table>
</div>
</div>


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