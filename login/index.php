<?php
include_once 'DataUser.php';
include_once 'User.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <form method="post" class="was-validated">
        <div class="control-group">
            <label class="control-label" for="username">User name:</label>
            <div class="controls">
                <input type="text" id="username" name="username" placeholder="Enter username" class="input-xlarge">
                <p class="help-block">Please provide your Username</p>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Email:</label>
            <div class="controls">
                <input type="text" id="email" name="email" placeholder="Enter email" class="input-xlarge">
                <p class="help-block">Please provide your email</p>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">Password:</label>
            <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                <p class="help-block">Password should be at least 4 characters</p>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="login">Login</button>
        <button type="submit" class="btn btn-primary" name="signup">Signup</button>
    </form>
</div>

</body>
</html>

<?php
if (isset($_POST['login'])) {
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    if (empty($username) ||empty($email) || empty($password)) {
        echo '<b>incomplete information</b>';
    } else {
        DataUser::login($username,$email , $password);
    }
} else if (isset($_POST['signup'])) {
    header('location: signup.php');
}