<?php
require('../includes/config.php');

$title = trim($_POST['title']);
$genre = trim($_POST['genre']);
$date_released = $_POST['date_released'];
$artist_id = $_POST["artist_id"];

$sql = "INSERT INTO albums (title, genre, date_released, artists_artist_id) VALUES ('$title', '$genre', '$date_released', $artist_id)";
print $sql;
 $result = mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
    header("Location: index.php");
 }
?>