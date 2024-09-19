<?php
include('../includes/header.php');
require("../includes/config.php");
?>

<body>
    <h1>artists</h1>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>album ID</th>
                <th>title </th>
                <th>artist name</th>
                <th>genre</th>
                <th>date released</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT al.album_id AS `album id`, al.title AS 'title', ar.name `artist name`, al.genre AS 'genre', al.date_released AS `date_released` FROM artists ar INNER JOIN albums al ON ar.artist_id = al.artists_artist_id ORDER BY al.date_released";

            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
           
                echo "<tr>
                        <td>{$row['album id']}</td>
                        <td>{$row['title']}</td>
                       
                        <td>{$row['artist name']}</td>
                        <td>{$row['genre']}</td>
                        <td>{$row['date_released']}</td>
                        
                        <td><a href=edit.php?id={$row['album id']}><i class='fa-regular fa-pen-to-square' aria-hidden='true' style='font-size:24px'></i></a><a href=delete.php?id={$row['album id']}><i class='fa-regular fa-trash-can' aria-hidden='true' style='font-size:24px; color:red'></i></a></td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
<?php
include('../includes/footer.php');
?>