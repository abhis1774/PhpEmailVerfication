
<?php 
include 'connection.php';
if(isset($_POST["login"]))
{
    $email = $_POST["email"];
    $password = $_POST["psw"];
$check_login = mysqli_query($conn,"SELECT * FROM user WHERE email='{$email}' AND password='{$password}' AND status='1' ");
$check = mysqli_num_rows($check_login);

if($check==1)
{
    echo'<script>
    alert("Login SucessFully!");
    window.location.href="login.php";</script>';
}
else
{
    echo' <script>
    alert("You have not confirmed your account yet. Please check your inbox and verify your email id.!");
    window.location.href="login.php";</script>';   
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=email]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

input[type=email], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="" method="POST">
  <div class="container">
    <center><h1>Login</h1></center>

    <label for="email"><b>Email:-</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password:-</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
   <center><button type="submit" name="login" class="registerbtn" >Login</button></center> 
  </div>
  
  <div class="container signin">
    <p>If U not registered Yet please.? <a href="index.php">Sign Up</a>.</p>
  </div>
</form>

</body>
</html>

