<?php
include_once 'DataCountry.php';
include_once 'Country.php';
$result = DataCountry::loadData();
if (isset($_REQUEST['sort'])){
    if ($_REQUEST['sort'] == 'up'){
        $result = DataCountry::sortCountryByGoldMedals('up');
    } else {
        $result = DataCountry::sortCountryByGoldMedals('down');
    }
}
if (isset($_REQUEST['page'])){
    if ($_REQUEST['page'] == 'delete'){
        $name = $_REQUEST['name'];
        array_splice($result, $name, 1);
        DataCountry::saveData($result);
        header("location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Olympic ranking table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2 style="text-align: center"><a href="index.php">Olympic ranking table</a></h2>
    <a href="add-country.php" type="button" class="btn btn-outline-success mb-3 mt-3 btn-lg">ADD COUNTRY</a>
    <a href="index.php?sort=up" type="button" class="btn btn-outline-success mb-3 mt-3 btn-lg" >SORT UP</a>
    <a href="index.php?sort=down" type="button" class="btn btn-outline-success mb-3 mt-3 btn-lg" >SORT DOWN</a>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error'];
            session_destroy();
            ?>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
        <tr class="table-active">
            <th>Country</th>
            <th>Gold Medals</th>
            <th>Silver Medals</th>
            <th>Bronze Medals</th>
            <th>Total Medals</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $key=> $country): ?>
        <tr class="table-info">
            <td><?php echo $country->getName()?></td>
            <td><?php echo $country->getGoldMedals()?></td>
            <td><?php echo $country->getSilverMedals()?></td>
            <td><?php echo $country->getBronzeMedals()?></td>
            <td><?php echo $country->getTotalMedals()?></td>
            <td><a onclick="confirm('Are you sure???')" href="index.php?page=delete&id=<?php echo $key ?>">Delete</a></td>
            <td><a href="edit-country.php?id=<?php echo $country->getName() ?>">Edit</a></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
