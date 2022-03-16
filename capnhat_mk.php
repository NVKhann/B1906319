<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}   
    session_start();
    $email = $_SESSION['email'];
    $pass = $_POST["pass"];
    $new_pass1 = $_POST['new_pass1'];
    $new_pass2 = $_POST['new_pass2'];

    $sql = "select id, fullname, email from customers where email = '".$email."' and password = '".md5($pass)."'";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        if($new_pass1 != $new_pass2){
            echo "Mật khẩu mới khác nhau! Vui lòng nhập lại";
            header('Refresh: 3;url=sua_mk.php');
        }
        else{
            $sql = "UPDATE customers set password = '".md5($_POST['new_pass1'])."'";
            $sql = $sql. " WHERE email='".$email."'";
            if ($conn->query($sql) == TRUE) {
                echo "Doi thanh cong";
                header('Refresh: 3;url=login.php');
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
        }
    } else {
      echo "Sai mật khẩu cũ vui lòng nhập lại";
      header('Refresh: 3;url=sua_mk.php');
    }    
$conn->close();

?>
