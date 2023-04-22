<!-- ააგეთ ფორმა, რომელიც უზრუნველყოფს მხოლოდ png, jpg, gif ფორმატის ფაილების ატვირთვას, ასატვირთი ფაილის ზომა
არ აღემატება 100 მბ-ის. ატვითული ფაილის სახელად დაარქვით მისი ატვირთვის რიგითობას დამატებული ატვირთვის
თარიღი. მაგალითად: თუ იტვირთება მეცხრე ფაილი 2017 წლის 12 მარტს, მაშინ ამ ფაილის სახელია 9-12-03-2017.
გამოიტანეთ ატვირთული ფაილები, ააგეთ გამოტანილი ფაილების წაშლის ფუნქციონალი. წაშლის შემდეგ რიგითობა უნდა
გაგრძელდეს ბოლოს ატვირთული ფაილის რიგიდან. -->

<?php

require "Image.php";

$error = null;
$success = null;
if(isset($_FILES["file"])){
    try{
        $image = new Image($_FILES["file"]);
        $file_name = $image->generate_file_name();
        $image->saveFile($_FILES["file"]['tmp_name'], Image::$upload_path . $file_name);
        $success = "image uploaded successfully";
    }
    catch(Exception $e){
        $error = $e->getMessage();
        var_dump($e->getMessage());
    }
 }
 else{
    if(isset($_POST["file_name"])){
        try{
            Image::deleteFile(Image::$upload_path . $_POST["file_name"]);
        }
        catch (Exception $e){
            var_dump($e->getMessage());
            $error = "could not delete file";
        }

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
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <button>submit</button>
    </form>
    <?php foreach(scandir("uploads") as $file): ?>
        <?php if($file == "." || $file == "..") continue; ?>
        <div>
            <img src="uploads/<?= $file ?>" alt="">
            <form method="post">
                <input type="hidden" name="file_name" value="<?= $file ?>">
                <button>delete</button>
            </form>
        </div>
    <?php endforeach; ?>
    <?php
        if(isset($error)){
            echo $error;
        }
        if(isset($success)){
            echo $success;
        }
    ?>
</body>
</html>