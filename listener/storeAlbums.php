<?php
include("../includes/header.php");
include("../includes/config.php");
var_dump($_POST);
var_dump($_SESSION);
$album_ids = $_POST['albums'];
foreach ($album_ids as $album_id) {
    $sql1 = "INSERT INTO albums_listeners (listeners_listener_id, albums_album_id) VALUES({$_SESSION['listener_id']}, $album_id )";
    $result = mysqli_query($conn, $sql1);
   
}
 if(mysqli_affected_rows($conn) > 0) {
header("Location: albumList.php");
    }
?>