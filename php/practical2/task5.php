<?php
function validateFieldsExist(array $data){
    if(!isset($data['name']) || !isset($data['email']) || !isset($data['gender'])){
        throw new Exception("name, email and gender are required");
    }
    else{
        $genders = ['male', 'female', 'other'];
        if(strlen($data['name']) < 5){
            throw new Exception("name must be at least 5 characters");
        }
        if(!in_array($data['gender'], $genders)){
            throw new Exception("invalid gender");
        }
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            throw new Exception("invalid email");
        }
        if(isset($data['website']) && !filter_var($data['website'], FILTER_VALIDATE_URL)){
            throw new Exception("invalid website");
        }
        if(isset($data['comment']) && strlen(trim($data['comment'])) > 100){
            echo(strlen($data['comment']));
            throw new Exception("comment must be less than 100 characters");
        }
    }
}
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $error;
        $data = $_POST;
        $success = false;
        try{
            validateFieldsExist($_POST);
            $error = null;
            $success = true;
        }catch(Exception $e){
            $error = $e->getMessage();
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
        <label for="name">name</label>
        <input required    type="text" name="name" id="name" value="<?php if(isset($data) && $success===false) echo $data['name']?>">
        <br>
        <label for="email">email</label>
        <input required    type="email" name="email" id="email" value="<?php if(isset($data) && $success===false) echo $data['email']?>">
        <br>
        <label for="website">website</label>
        <input type="text" name="website" id="website" value="<?php if(isset($data) && $success===false) echo $data['website']?>">
        <br>
        <label for="comment">comment</label>
        <textarea name="comment" id="comment" cols="30" rows="10">
        <?php if(isset($data) && $success===false) echo $data['comment']?>
        </textarea>
        <br>
        <label >gender</label>
        <input <?php if (isset($data) && $data['gender'] === 'male' && $success===false) echo 'checked'; ?> type="radio" id="male" name="gender" value="male">
        <label for="male">male</label>
        <input <?php if (isset($data) && $data['gender'] === 'female' && $success===false) echo 'checked'; ?> type="radio" name="gender" id="female" value="female">
        <label for="female">female</label>
        <input <?php if (isset($data) && $data['gender'] === 'other' && $success===false) echo 'checked'; ?> type="radio" name="gender" id="other" value="other">
        <label for="other">other</label>
        <br>
        <button>submit</button>
        <?php if(isset($error)):?>
            <p><?php echo $error ?></p>
        <?php endif; ?>
    </form>
    <?php if($success):?>
        <h1>success</h1>
        <table>
            <tr>
                <td>name</td>
                <td>email</td>
                <td>website</td>
                <td>comment</td>
                <td>gender</td>
            </tr>
            <tr>
                <?php foreach($data as $key => $value):?>
                    <td><?php echo $value ?></td>
                <?php endforeach; ?>
            </tr>
        </table>
    <?php endif; ?>
</body>
</html>