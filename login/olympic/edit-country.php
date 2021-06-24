<?php
include_once 'DataCountry.php';
include_once 'Country.php';
if (isset($_REQUEST['name'])){
    $name = $_REQUEST['name'];
    $country = DataCountry::getCountryByName($name);
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Edit Country</title>
</head>
<body>
<div class="container">
    <h2>Update Information Of Country</h2>
    <form method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" class="from-control" name="name" placeholder="Input Name" value="<?php echo $country->getName()?>">
        </div>
        <div>
            <label for="goldMedals">Gold Medals:</label>
            <input type="number" class="from-control" name="goldMedals" placeholder="Enter the number of gold medals" value="<?php echo $country->getGoldMedals()?>">
        </div>
        <div>
            <label for="silverMedals">Silver Medals:</label>
            <input type="number" class="from-control" name="silverMedals" placeholder="Enter the number of silver medals" value="<?php echo $country->getSilverMedals()?>">
        </div>
        <div>
            <label for="bronzeMedals">Gold Medals:</label>
            <input type="number" class="from-control" name="bronzeMedals" placeholder="Enter the number of bronze medals" value="<?php echo $country->getBronzeMedals()?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_REQUEST['name'];
    $goldMedals = $_REQUEST['goldMedals'];
    $silverMedals = $_REQUEST['silverMedals'];
    $bronzeMedals = $_REQUEST['bronzeMedals'];
    $country = new Country($name, $goldMedals, $silverMedals, $bronzeMedals);
    DataCountry::editCountryByName($name, $country);
    header("location: index.php");
}
?>

