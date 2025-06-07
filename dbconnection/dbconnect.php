<?php

$servername = 'localhost';
$user = 'root';
$dbpass = '';
$dbname = 'islandwalkers';


$conn = mysqli_connect($servername, $user, $dbpass, $dbname);

if (!$conn) {

    die("<script>alert('Connection Failed !')</script>"); 

} 
else{

  // echo ("<script>alert('Connection success !')</script>"); 
}
?>
