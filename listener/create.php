<?php
include("../includes/header.php");
include("../includes/config.php");
if (!isset($_SESSION['email'])) {
    $_SESSION['message'] = "please Login to access the page";
    header("Location: ../user/login.php" );
}
// print_r($_SESSION);
$sql = "SELECT user_id, email FROM users WHERE user_id = {$_SESSION['user_id']}";
// var_dump($sql);
$result = mysqli_query($conn, $sql);


$row = mysqli_fetch_assoc($result);


// while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="container-fluid container-lg">
    <form action="store.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="listenerName">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">address</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="listenerImage">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
include("../includes/footer.php");
?>