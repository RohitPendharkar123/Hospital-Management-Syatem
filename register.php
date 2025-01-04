<?php
// Start a session
session_start();

// Include database connection
include 'connection.php';

if (isset($_POST['submit'])) {
    // Get form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['inlineRadioOptions'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL query for inserting user data
    $sql = "INSERT INTO users (fname, lname, email, gender, number, password) VALUES ('$fname', '$lname', '$email', '$gender', '$number', '$password')";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die('MySQL error: ' . mysqli_error($conn));
    }

    // Bind parameters to the prepared statement
    // 'ssssss' specifies that we are binding 6 string parameters
    

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Registration successful!'); window.location.href='./userdahboard/src/html/index.php';</script>";
    } else {
        echo "<script>alert('Registration failed: " . mysqli_error($conn) . "');</script>";
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Regiter</title>
    <style>
        .gradient-custom {

background: #f093fb;


background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
}
    </style>
</head>
<body>
<section class="vh-100 gradient-custom ">
  <div class="container py-5 h-90">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-3 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <form method="POST" action="register.php">

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                  <label class="form-label" for="firstName">First Name</label>
                    <input type="text" id="firstName" name="fname" class="form-control form-control-lg" />
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                  <label class="form-label" for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lname" class="form-control form-control-lg" />
                    
                  </div>

                </div>
              </div>

              <div class="row">

              <div class="col-md-6 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                  <label class="form-label" for="emailAddress">Email</label>
                    <input type="email" id="emailAddress" name="email" class="form-control form-control-lg" />
                    
                  </div>

                </div>
                
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                      value="Female" checked />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                      value="Male" />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                      value="Other" />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>

                </div>
              </div>

              <div class="row">
                
                <div class="col-md-6 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                  <label class="form-label" for="phoneNumber">Phone Number</label>
                    <input type="tel" id="phoneNumber" name="number" class="form-control form-control-lg" />
                    
                  </div>

                </div>

                <div class="col-md-6 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                  <label class="form-label" for="password">Password</label>
                    <input type="tel" id="password" name="password" class="form-control form-control-lg" />
                    
                  </div>

                </div>
              </div>

              
              <div class="d-flex justify-content-center">
                <button class="btn btn-primary" name="submit">Submit</button>
                </div>
              <div><a href="login.php">Login </div>
            
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</body>
</html>