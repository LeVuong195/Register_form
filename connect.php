<?php
$servername = "localhost";
$username = "soap";
$password = "123456";
$db = "register_form";
// Create connection
//conn = new mysqli($servername, $username, $password, $db);
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công <br>";
$conn->set_charset("utf-8");
?>




