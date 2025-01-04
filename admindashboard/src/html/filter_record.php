<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title> </title>
</head>

<div class="container">
 <div class="col-md-12">
   
    
     <div class="card mt-5">
     <div class="card-header">
    <h4>Filter the record of appointment users</h4>
    </div>
         <form method="POST" action="#">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Select Start Date</label>
                       <input type="date" name="start_date" placeholder="select date" value="<?php if (isset($_POST['start_date'])){ echo $_POST['start_date']; }?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Select End Date</label>
                       <input type="date" name="end_date" placeholder="select date" value="<?php if (isset($_POST['end_date'])){ echo $_POST['end_date']; }?>">
                    </div>
                </div>
            
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">filter record</label>
                      <button for="submit" class="btn btn-primary" name="submit">Filter</button>
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

</body>
</html>