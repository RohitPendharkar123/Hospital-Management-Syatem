

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
        <!-- Sidebar navigation-->
        <?php

include 'sidebar.php';

?>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      
      <?php
        include 'header.php'
      ?>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="card">
         <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Specialization</th>
              <th>Phone</th>
              <th>Department</th>
              <th>Image</th>
            </tr>
            
          </thead>
          <tbody>
          <?php

          include 'conn.php';

$sql = "SELECT * FROM doctor"; 
$result = $conn->query($sql);


if ($result === false) {
    die("Query failed: " . $conn->error);
}


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";   
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["specialization"] . "</td  >";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["department"] . "</td>";
        // echo "<td><img src='./doctor_image/' " . $row["image"] . "' alt='Doctor Image' width='50'></td>";
        $img = '../../../admindashboard/src/html/doctor_imagee/' . $row["image"];
        // echo "<td><img src='./admindashboard/src/html/doctor_image/" . $row["image"] . "' alt='Doctor Image'></td>";
        echo "<td><img src='$img' alt='Doctor Image' width='50'></td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
}
?>
<img src="" alt="">
          </tbody>
         </table>
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