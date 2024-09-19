<?php
require('../includes/config.php');
$album_id = (int) $_GET['id'];

$sql = "DELETE FROM albums WHERE album_id = $album_id LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
    header("Location: index.php ");
}
