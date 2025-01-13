<?php 
include 'database.php';
?>

<?php
$db = new database();
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id === 0) {
    die("Invalid ID");
}
$query = "SELECT * FROM users WHERE id=$id";
$getData = $db->select($query)->fetch_assoc();

if (isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    $email = mysqli_real_escape_string($db->link,$_POST['email']);
    $phone = mysqli_real_escape_string($db->link,$_POST['phone']);
    if($name == '' || $email == '' || $phone == ''){
        $error = "Field empty!";
    } else {
        $query = "UPDATE users SET name = '$name', email = '$email', phone = '$phone' WHERE id = $id";
        $update = $db->update($query);
    }
}
?>
<?php if(isset($error)){
    echo $error;
}    
?>

<?php 
    if(isset($_POST['delete'])){
        $query = "DELETE FROM users WHERE id = $id";
        $deleteData = $db->delete($query);
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
    <form action="update.php?id=<?php echo $id;?>" method="post">
        <table>
        <tr>
        <td>Name: </td>
        <td><input type="text" name="name" value="<?php echo $getData ['name']; ?>"></td>
        </tr>
        <tr>
        <td>email: </td>
        <td><input type="text" name="email" value="<?php echo $getData['email']; ?>"></td>
        </tr>
        <tr>
        <td>Phone: </td>
        <td><input type="text" name="phone" value="<?php echo $getData['phone']; ?>"></td>    
        </tr>    
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" value="Cancel">
                    <input type="submit" name="delete" value="Delete">
                </td>
            </tr>
        </table>
        <a href="index.php">Go back</a>
    </form>
</body>
</html>