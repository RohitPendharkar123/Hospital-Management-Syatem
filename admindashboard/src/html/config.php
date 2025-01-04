<?php

$servername = 'localhost';  
$username = 'root';           
$password = '';               
$db = 'hospital_management_system';          

 
$conn = mysqli_connect($servername, $username, $password, $db);

 
if (!$conn) {
    die ("Connection Faild : " .mysqli_connect_error() );
} 

?>
