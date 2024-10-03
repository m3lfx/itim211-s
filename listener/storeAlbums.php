<?php
include("../includes/header.php");
include("../includes/config.php");

$album_ids = $_POST['albums'];
if(isset($_POST['albums'])) {
    $result = mysqli_query($conn, "DELETE FROM albums_listeners WHERE  listeners_listener_id = {$_SESSION['listener_id']}");
    foreach ($album_ids as $album_id) {
        $sql1 = "INSERT INTO albums_listeners (listeners_listener_id, albums_album_id) VALUES({$_SESSION['listener_id']}, $album_id )";
        $result = mysqli_query($conn, $sql1);
       
    }
}


else {
    $result = mysqli_query($conn, "DELETE FROM albums_listeners WHERE  listeners_listener_id = {$_SESSION['listener_id']}"); 
}
 if(mysqli_affected_rows($conn) > 0) {
header("Location: albumList.php");
    }
?>