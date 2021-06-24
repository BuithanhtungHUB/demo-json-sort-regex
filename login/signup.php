<?php
include "User.php";
include "Validate.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $passwordConfirm = $_REQUEST['password_confirm'];
    $user = new User($username, $email, $password);
    Validate::checkUserName($username);
    Validate::checkPassword($password);
    Validate::checkEmail($email);
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $passwordConfirm = $_POST['password_confirm'];
    if (empty($username) || empty($password) || empty($email) || empty($passwordConfirm)) {
        echo '<b> Please enter username and password!</b>';
    } else if ($password != $passwordConfirm) {
        echo '<b> Password is not correct, please enter password!</b>';
    } else {
        $user = new  User($username, $email, $password);
        DataUser::addUser($user);
        header('location: index.php');
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<form class="form-horizontal" action='' method="POST">
    <fieldset>
        <div id="legend">
            <legend class="">Register</legend>
        </div>

        <div class="control-group">
            <!-- Username -->
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                <p class="help-block text-danger"><?php if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                        session_destroy();
                    } ?></p>
            </div>
        </div>

        <div class="control-group">
            <!-- E-mail -->
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                <p class="help-block text-danger"><?php if (isset($_SESSION['email'])) {
                        echo $_SESSION['email'];
                        session_destroy();
                    } ?></p>
            </div>
        </div>

        <div class="control-group">
            <!-- Password-->
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                <p class="help-block text-danger"><?php if (isset($_SESSION['password'])) {
                        echo $_SESSION['password'];
                        session_destroy();
                    } ?></p>
            </div>
        </div>

        <div class="control-group">
            <!-- Password -->
            <label class="control-label" for="password_confirm">Password (Confirm)</label>
            <div class="controls">
                <input type="password" id="password_confirm" name="password_confirm" placeholder=""
                       class="input-xlarge">
                <p class="help-block">Please confirm password</p>
            </div>
        </div>

        <div class="control-group">
            <!-- Button -->
            <div class="controls">
                <button class="btn btn-success">Register</button>
            </div>
        </div>
    </fieldset>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>

<?php
include_once "DataUser.php";
include_once "User.php";


?>