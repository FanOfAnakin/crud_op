<?php include 'database.php'?>
<?php
$db = new database();
if (isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    $email = mysqli_real_escape_string($db->link,$_POST['email']);
    $phone = mysqli_real_escape_string($db->link,$_POST['phone']);
    if($name == '' || $email == '' || $phone == ''){
        $error = "Field empty!";
    } else {
        $insert_query = "INSERT INTO users(name,email,phone) values ('$name','$email','$phone')";
        $create = $db->insert($insert_query);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="style.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create.php" method="post">
        <table>
        <tr>
        <td>Name: </td>
        <td><input type="text" name="name" placeholder="Enter Your name"></td>
        </tr>
        <tr>
        <td>email: </td>
        <td><input type="text" name="email" placeholder="Enter Your email"></td>
        </tr>
        <tr>
        <td>Phone: </td>
        <td><input type="text" name="phone" placeholder="Enter Your Number"></td>    
        </tr>    
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" value="Cancel">
                </td>
            </tr>
        </table>
        <a href="index.php">Go back</a>
    </form>
</body>
</html>