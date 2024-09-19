<?php
    include("../includes/config.php");
    
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $password = sha1($password);
    var_dump($password);
    $sql = "INSERT INTO users (email,password) VALUES('$email', '$password')";
    // print $sql;
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: ../index.php");
        
    }
  
?>