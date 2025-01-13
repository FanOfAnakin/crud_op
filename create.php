<?php include 'database.php'?>
<?php
$db = new database();
$if (isset($_POST['submit'])){
    356

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
        <td><input type="text" name="Phone" placeholder="Enter Your Number"></td>    
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