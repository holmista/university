<?php
// განსაზღვრეთ 4x4 რიცხვითი მატრიცა. ელემენტებს მნიშვნელობები მიანიჭეთ [10; 100]-შუალედიდან. გამოიტანეთ მატრიცის
// ელემენტები ცხრილის სახით, გამოიტანეთ მატრიცის მთავარი დიაგონალის ზემოთ მდგომი ელემენტები ცხრილის სახით. შეიტანეთ
// X რიცხვი $_POST მეთოდის საშუალებით, გამოიტანეთ მატრიცაში არსებული X რიცხვის ჯერადი რიცხვები, გამოიტანეთ
// მატრიცის ელემენტების ჯამი, ნამრავლი, საშუალო არითმეტიკული, განი, თითოეული ელემენტის ციფრთა ჯამი ცხრილის
// სახით.

$matrix = [];
for($i = 0; $i < 4; $i++) {
    $row = [];
    for($j = 0; $j < 4; $j++) {
        $row[$j] = rand(10, 100);
    }
    $matrix[$i] = $row;
}
$flattened_array = array_reduce($matrix, 'array_merge', []);
$sum = array_sum($flattened_array);
$average = array_sum($flattened_array) / count($flattened_array);
$median = $flattened_array[count($flattened_array) / 2];
$product = array_product($flattened_array);
// product of digits
$digit_products = [];
foreach($matrix as $row) {
    $matrix_row = [];
    foreach($row as $element){
        $digits = str_split($element);
        $product = 1;
        foreach($digits as $digit) {
            $product *= $digit;
        }
        $matrix_row[] = $product;
    }
    $digit_products[] = $matrix_row;
}
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
        <?php for($i = 0; $i < 4; $i++): ?>
            <tr>
                <?php for($j = 0; $j < 4; $j++): ?>
                    <td><?php echo $matrix[$i][$j]; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
    <table>
        <?php for($i = 0; $i < 4; $i++): ?>
            <tr>
                <?php for($j = $i+1; $j < 4; $j++): ?>
                    <td><?php echo $digit_products[$i][$j]; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
    <table>
        <?php for($i = 0; $i < 4; $i++): ?>
            <tr>
                <?php for($j = 0; $j < 4; $j++): ?>
                    <td><?php echo $digit_products[$i][$j]; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    <h3>sum: <?= $sum?> </h3>
    <h3>average: <?= $average?> </h3>
    <h3>median: <?= $median?> </h3>
    <h3>product: <?= $product?> </h3>
    <form action="task2.php" method="post">
        <input type="number" name="x">
        <input type="submit" value="submit">
    </form>
</body>
</html>

