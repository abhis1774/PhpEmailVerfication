<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 

include 'connection.php';

$active_account = mysqli_query($conn,"UPDATE user SET status='1' WHERE id='".$_GET["id"]."' ");
if($active_account)
{
    echo  '<center><h1>ACCOUNT Activated</h1>
    To Return Home Page<a href="http://localhost/PhpEmailVerfication/smtp/index.php"><span style="color:blue;">Click here</span></a></center>
    '; 
}

?>
<body>
   
</body>
</html>