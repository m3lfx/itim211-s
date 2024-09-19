<?php
// print $_GET['id'];
include('../includes/header.php');
require('../includes/config.php');
$album_id = (int) $_GET['id'];

$sql = "SELECT al.album_id AS `album_id`, al.title AS 'title', ar.name AS `artist name`, al.genre AS 'genre', al.date_released AS `date_released`, ar.artist_id AS `artist_id` FROM artists ar INNER JOIN albums al ON ar.artist_id = al.artists_artist_id WHERE album_id = $album_id";
// print $sql;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$sql2 = "SELECT * FROM artists WHERE artist_id <> {$row['artist_id']}";
// print $sql2;
$artists = mysqli_query($conn, $sql2);

?>

<body>
    <div class="container-fluid container-lg">

        <form action="update.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="albumId">album id</label>
                <input type="text" class="form-control" id="albumId" name="title" value=<?php print "{$row['album_id']} ;" ?> readonly disabled />

            </div>

            <div class="form-group">
                <label for="albumName">album name</label>
                <input type="text" class="form-control" id="albumName" aria-describedby="emailHelp" name="title" value=<?php print "{$row['title']} ;" ?> />

            </div>

            <div class="form-group">
                <label for="genre">genre</label>
                <input type="text" class="form-control" id="genre"
                    name="genre" value="<?php print $row['genre']; ?>" />
            </div>

            <div class="form-group">
                <label for="dateReleased">Date Released</label>
                <input type="date" class="form-control" id="dateReleased" placeholder="artist country"
                    name="date_released" value="<?php print $row['date_released']; ?>">
            </div>
            

            <div class="form-group">
                <label for="artistName">Artist Name</label>
                <select name="artist_id" id="artistName" class="form-control">
                    <option value="<?php print $row['artist_id']; ?>" selected><?php print $row['artist name']; ?> </option>
                    <?php while ($row = mysqli_fetch_assoc($artists)) {
                        echo "<option value='{$row['artist_id']}' >{$row['name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            <a href="index.php" class="btn btn-secondary btn-sm " role="button" aria-disabled="true">Cancel</a>
        </form>
    </div>
</body>
<?php
include('../includes/footer.php');
?>