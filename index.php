<?php 

include 'database.php';
?>
<?php
$db = new database();
$query = "SELECT * FROM users";
$read = $db->select($query);
?>
<?php
if(isset($error)){
    echo $error;
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
 <table >
    <tr>
        <th >Serial No.</th>
        <th >Name</th>
        <th >Email</th>
        <th >Phone</th>
        <th >Action</th>
    </tr>
    <?php if($read) {?>
        
        <?php
        $i = 1;
        while($row = $read -> fetch_assoc()) {?>
    <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $row ['name']?></td>
        <td><?php echo $row ['email']?></td>
        <td><?php echo $row ['phone']?></td>
        <td><a href="update.php?id=<?php echo $row['id']?>">Edit</a></td>
    </tr>
    <?php } ?>
    <?php } else {?>
        <p>No Data Found!</p>
    <?php }?>
 </table>
 <a href="create.php">Create</a>

</body>
</html>
