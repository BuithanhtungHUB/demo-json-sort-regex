<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Country</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>ADD COUNTRY</h2>
    <form method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Input Name" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <label for="goldMedals">Gold Medals:</label>
            <input type="text" class="form-control" name="goldMedals" placeholder="Enter the number of gold medals " required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <label for="silverMedals">Silver Medals:</label>
            <input type="text" class="form-control" name="silverMedals" placeholder="Enter the number of silver medals " required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <label for="bronzeMedals">Bronze Medals:</label>
            <input type="text" class="form-control" name="bronzeMedals" placeholder="Enter the number of bronze medals " required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>

</body>
</html>

<?php
include_once 'DataCountry.php';
include_once 'Country.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_REQUEST['name'];
    $goldMedals = $_REQUEST['goldMedals'];
    $silverMedals = $_REQUEST['silverMedals'];
    $bronzeMedals = $_REQUEST['bronzeMedals'];
    $country = new Country($name, $goldMedals, $silverMedals, $bronzeMedals);
    DataCountry::addCountry($country);
    header("location: index.php");
}
?>