<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo-removebg-preview.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <style type="text/css">
    .services a {
  text-decoration: none;
}
.services .service-box {
  text-align: center;
}
.services .service-box h2 {
  color: #222;
  font-size: 20px;
  padding-top: 10px;
  text-decoration: none;
}
.services a .service-box:hover h2 {
  color: #FB0626;
}
.services .investor-box {
    background-color: #FFF9A2;
    background-position: center center;
    padding: 20px;
    width: 100%;
    min-height: 150px;
    display: block;
    position: relative;
  box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.2);
}
.services .investor-box h2 {
  font-size: 20px;
}
.services .investor-box .flip-view {
  position: absolute;
  top: 0;
  width: 100%;
  background-color: red;
  left: -10%;
  padding: 20px;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  visibility: hidden;
  opacity: 0;
  transition: all ease-in-out 333ms;
}
.services .investor-box a {
  color: #fff;
  font-size: 20px;
  font-weight: 600;
}
.services .investor-box:hover .flip-view {
    left: 0;
    visibility: visible;
    opacity: 1;
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
      
    </aside>
    
    <div class="body-wrapper">
      
      <?php

      include 'header.php';
      ?>
      <div class="container-fluid">
        <div class="row">
           
        
       
         <div class="services pb-5">
          <div class="container">
            <div class="pt-5">
              <h2 class="vc_custom_heading ico_header">View Card</h2>
              <hr>
              <div class="row">
                <div class="col-md-3">
                  <div class="investor-box">
                    <h2>Appointment Registation</h2>
                    <div class="flip-view">
                      <a href="./appointment.php">Appointment<i class="fas fa-chevron-circle-right"></i></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="investor-box">
                    <h2>Available Doctor</h2>
                    <div class="flip-view">
                      <a href="doctors.php">Doctor <i class="fas fa-chevron-circle-right"></i></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="investor-box">
                    <h2>About</h2>
                    <div class="flip-view">
                      <a href="about.php">Read More <i class="fas fa-chevron-circle-right"></i></a>
                    </div>
                  </div>
                </div>
                
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end services-->
       
        
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by : Rohit Pendharkar</p>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>