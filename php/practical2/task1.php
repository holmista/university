
<?php

// განსაზღვრეთ 12 ელემენტიანი რიცხვითი მასივი. ელემენტებს მნიშვნელობები მიანიჭეთ [10; 100]-შუალედიდან. დაადგინეთ
// რამდენი ელემენტია მასივში შეტანილ X რიცხვზე ნაკლები და რამდენი მეტი. X რიცხვის შეტანა მოახდინეთ $_POST მეთოდის
// საშუალებით.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = $_POST['number'];
    $array = [];
    for($i = 0; $i < 12; $i++) {
        $array[$i] = rand(10, 100);
    }
    $countLess = 0;
    $countMore = 0;
    foreach($array as $value) {
        if($value < $number) 
            $countLess++;
        if($value > $number) 
            $countMore++;
    }
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
    <form method="post" action="">
        <label for="number">enter number</label>
        <input name="number" id="number" type="number">
        <button>go!</button>
    </form>
    <?php if(isset($array)): ?>
        <h3>მასივში შეტანილი რიცხვების რაოდენობა ნაკლებია <?= $number ?>-ზე: <?= $countLess ?></h3>
        <h3>მასივში შეტანილი რიცხვების რაოდენობა მეტია <?= $number ?>-ზე: <?= $countMore ?></h3>
    <?php endif; ?>

</body>
</html>



