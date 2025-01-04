
<?php
// Start a session
session_start();

// Include the database connection
include 'connection.php';

if (isset($_POST['submit'])) {
    // Get the login form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL query
    $sql = "SELECT * FROM users WHERE email = '$email'";  // Ensure this line has no errors

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    // Check if the statement preparation is successful
    if ($stmt === false) {
        die('MySQL error: ' . mysqli_error($conn));  // Handle errors if preparation fails
    }

    // Bind the email parameter (only one parameter for the SELECT query)
    

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Get the result of the query
    $result = mysqli_stmt_get_result($stmt);

    // Check if the user exists
    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables for user information
            $_SESSION['id'] = $user['id'];
            $_SESSION['fname'] = $user['fname'];
            $_SESSION['lname'] = $user['lname'];

            // Redirect to the user dashboard
            header("Location: ./userdahboard/src/html/index.php");
            exit;
        } else {
            // echo "<script>alert('Invalid password!');</script>";
            header("Location: ./userdahboard/src/html/index.php");
        }
    } else {
        echo "<script>alert('No user found with that email!');</script>";
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
        .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
    </style>
</head>
<body>
<!-- <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <form method="POST" action="login.php">

             

              <div class="row">
                
               
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                  <label class="form-label" for="email">Email</label>
                    <input type="email" id="emailAddress" name="email" class="form-control form-control-lg" required>
                    
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                  <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" required >
                    
                  </div>

                </div>
              </div>

              <div class="mt-4 pt-2">
                <button class="btn btn-primary btn-lg" type="submit" name="submit"> Login </button>
              </div>
              <div><a href="./admindashboard/src/html/adminlogin.php">admin login </div>

            </form>


          </div>  
        </div>
      </div>
    </div>
  </div>
</section> -->
    

<section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src=" img.jpg"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="POST" action="login.php">

               
      
                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0">Log In<p>
                </div>
      
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  
                  <label class="form-label" for="form3Example3">Email address:-</label>
                  <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" />
                </div>
      
                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-3">
                  
                  <label class="form-label" for="form3Example4">Password:-</label>
                  <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                    placeholder="Enter password" />
                </div>
      
                <div class="d-flex justify-content-between align-items-center">
                 
                  <a href="#!" class="text-body">Forgot password?</a>
                </div>
      
                <div class="text-center text-lg-start mt-4 pt-2">
                <button class="btn btn-primary btn-lg" type="submit" name="submit"> Login </button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                      class="link-danger">Register</a></p>
                </div>
      
              </form>
            </div>
          </div>
        </div>
        
      
        </div>
      </section> 
</body>
</html>