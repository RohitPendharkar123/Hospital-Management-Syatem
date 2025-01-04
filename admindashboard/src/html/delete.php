<?php
include 'config.php';

;
if (isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];
    $sql = "DELETE FROM appointments WHERE id =$id";
    $result = mysqli_query($conn , $sql);
    if($result)
    {
        echo"<script>alert('Data Deleted Successfully...') </script>";
    }
    else
    {
        die("Faild : " .mysqli_error($conn));
    }
}

?>
