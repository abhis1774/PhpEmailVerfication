

<?php 
include 'connection.php';
if(isset($_POST["submit"]))
{
	$name = $_POST["name"];
	$email = $_POST["email"];
	$pass = $_POST["psw"];
	$status = 0;

	$query = mysqli_query($conn,"INSERT INTO user(name,email,password,status) VALUES('{$name}','{$email}','{$pass}','{$status}')") or die("Unsucess!");
if($query)
  {
	echo "<script>
	alert('Please Check your Email to verify your Account.');
	window.location.href='index.php';</script>";
   }
   $id = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email'");
   while($I = mysqli_fetch_assoc($id))
   {
	   $uid = $I["id"];
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
  <center>  <h1>Register</h1></center>
    <p>Please fill in this form to create an account.</p>
    <hr>
	<label for="email"><b>Name:-</b></label>
    <input type="text" placeholder="Enter Email" name="name" id="email" required>

    <label for="email"><b>Email:-</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password:-</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
   <center><button type="submit" name="submit" class="registerbtn">Register</button></center> 
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>



<?php
include('smtp/PHPMailerAutoload.php');
$html = "<a href='http://localhost/PhpEmailVerfication/smtp/index2.php?id=$uid'><span style='color:blue;'>Click Here To Active Account</span></a>";
 smtp_mailer($email,"Email Verification",$html); //(to,subject,Message)
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	// $mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "Email@gmail.com"; //From
	$mail->Password = "password"; //Password
	$mail->SetFrom("email@gmail.com");//From
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		// echo "error";
	}else{
		return 'Email Is Successfully Send To "'.$to.'"';
	}
}
?>