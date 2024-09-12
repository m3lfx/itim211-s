<?php
include('../includes/header.php');
?>
<body>
    <div class="container-fluid">
        <form action="store.php" method="POST" >
            <div class="form-group">
                <label for="artistName">Artist name</label>
                <input type="text" class="form-control" id="artistName" aria-describedby="emailHelp" placeholder="Enter name"
                    name="artistName">

            </div>
            <div class="form-group">
                <label for="country">country</label>
                <input type="text" class="form-control" id="country" placeholder="artist country"
                    name="country">
            </div>
            <div class="form-group">
                <label for="image">upload image</label>
                <input type="file" class="form-control" id="image" placeholder="image"
                    name="image">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

<?php
include('../includes/footer.php');
?>