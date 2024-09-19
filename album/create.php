<?php
include('../includes/header.php');
include('../includes/config.php');
$sql = "SELECT * FROM artists";

$result = mysqli_query($conn, $sql);
?>

<body>

    <div class="container-fluid container-lg">
        <form action="store.php" method="POST" >
            <div class="form-group">
                <label for="title">Album title</label>
                <input type="text" class="form-control" id="artistName" aria-describedby="emailHelp" placeholder="Enter name"
                    name="title">

            </div>
            <div class="form-group">
                <label for="genre">genre</label>
                <input type="text" class="form-control" id="genre" placeholder="artist country"
                    name="genre">
            </div>
            <div class="form-group">
                <label for="dateReleased">Date Released</label>
                <input type="date" class="form-control" id="dateReleased" placeholder="artist country"
                    name="date_released">
            </div>
            <div class="form-group">
                <label for="artistName">Artist Name</label>
                <select name="artist_id" id="artistName" class="form-control">
                    <?php while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['artist_id']}'>{$row['name']}</option>";
                    }

                    ?>


                </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

<?php
include('../includes/footer.php');
?>