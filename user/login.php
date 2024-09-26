<?php
// session_start();

include("../includes/header.php");
include("../includes/config.php");
print_r($_SESSION);
if (isset($_POST['submit'])) {
    // var_dump($_POST);
    $email = trim($_POST['email']);
    $pass = sha1($_POST['password']);
    $sql = "SELECT email, user_id FROM users WHERE email='$email' AND password='$pass' LIMIT 1";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
       
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: profile.php");
    } else {
        $_SESSION['message'] = 'wrong email or password';
    }
}
if (isset($_SESSION['message'])) {
    // var_dump($_SESSION);
    $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>{$_SESSION['message']}</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    // unset($_SESSION['message']);
    
}
?>
<div class="row col-md-8 mx-auto ">
    <?php echo $error; unset($_SESSION['message']);  ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" class="form-control" name="email" />
            <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" name="password" />
            <label class="form-label" for="form2Example2">Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
       
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Sign in</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="register.php">Register</a></p>
        </div>
    </form>
</div>
<?php
include("../includes/footer.php");
?>