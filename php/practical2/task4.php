<?php

// მოცემულია მრავალგანზომილებიანი ასოციაციური მასივი:
$cars = array(
array("Make"=>"Toyota",
"Model"=>"Corolla",
"Color"=>"White",
"Mileage"=>24000,
"Status"=>"Sold"),
array("Make"=>"Toyota",
"Model"=>"Camry",
"Color"=>"Black",
"Mileage"=>56000,
"Status"=>"Available"),
array("Make"=>"Honda",
"Model"=>"Accord",
"Color"=>"White",
"Mileage"=>15000,
"Status"=>"Sold") );
// გამოიტანეთ მატრიცა ცხრილის სახით.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Make</th>
            <th>Model</th>
            <th>Color</th>
            <th>Mileage</th>
            <th>Status</th>
        </tr>
        <?php foreach($cars as $car): ?>
            <tr>
                <td><?= $car["Make"] ?></td>
                <td><?= $car["Model"] ?></td>
                <td><?= $car["Color"] ?></td>
                <td><?= $car["Mileage"] ?></td>
                <td><?= $car["Status"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>



