
<?php
// Start a session
session_start();

// Include the database connection
include 'config.php';

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
            $_SESSION['id'] = $user['id'];
            $_SESSION['fname'] = $user['fname'];
            $_SESSION['lname'] = $user['lname'];
            header("Location: ./index.php");
            exit;
        } else {
            header("Location: ./index.php");
        }
    } else {
        echo "<script>alert('No user found with that email!');</script>";
    }

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
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <form method="POST" action="#">

             

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
</section>
    
</body>
</html>