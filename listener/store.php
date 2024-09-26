<?php
session_start();
include("../includes/config.php");

$name = trim($_POST['listenerName']);
$address = trim($_POST['address']);
$user_id = $_SESSION['user_id'];
var_dump($_POST);
if (isset($_FILES['listenerImage'])) {

    $filename = $_FILES["listenerImage"]["name"];

    $tempname = $_FILES["listenerImage"]["tmp_name"];
    $folder = "../images/" . $filename;
    $sql = "INSERT INTO listeners(name, address, img_path, users_user_id) VALUES('$name', '$address','$filename','$user_id')";
    echo $sql;
    $result = mysqli_query($conn, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
    if (mysqli_affected_rows($conn) > 1) {
        header("Location: ../user/profile.php");
    }
}
