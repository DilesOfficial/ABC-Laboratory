<?php
@include 'config.php';
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = ($_POST['password']);
   $cpass = ($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM login WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'Password not matched!';
      }else{
         $insert = "INSERT INTO login (name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

   <style>
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
}

.container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
}

.container .content{
   text-align: center;
}
.container .content h3{
   font-size: 30px;
   color:#333;
}

.container .content h3 span{
   background: crimson;
   color:#fff;
   border-radius: 5px;
   padding:0 15px;
}
.container .content h1{
   font-size: 50px;
   color:#333;
}

.container .content h1 span{
   color:crimson;
}
.container .content p{
   font-size: 25px;
   margin-bottom: 20px;
}

.container .content .btn{
   display: inline-block;
   padding:10px 30px;
   font-size: 20px;
   background: #333;
   color:#fff;
   margin:0 5px;
   text-transform: capitalize;
}

.container .content .btn:hover{
   background: crimson;
}
.form-container{
   display: flex;
   align-items: center;
   justify-content: center;
   padding:37px;
   background: #E3FADE;
   border: 1px solid green; 
   border-radius: 4px; 
}

.form-container form{
   padding:50px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   background: #fff;
   text-align: center;
   width: 600px;
   height: 580px;
   padding-left: 60px;
   padding-right: 60px;
   border-style:groove; 
   border-color: green; 
   border-width: 3px; 
}

.form-container form h3{
   font-size: 30px;
   text-transform: uppercase;
   margin-bottom: 10px;
   color:#333;
}
.form-container form input,
.form-container form select{
   width: 100%;
   padding:10px 15px;
   font-size: 17px;
   margin:8px 0;
   background: #fff;
   border-radius: 5px;
}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: #E3FADE;
   color:#177C16;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}
.form-container form .form-btn:hover{
   background: #177C16;
   color:#E3FADE;
}

.form-container form p{
   margin-top: 10px;
   font-size: 17px;
   color:#333;
}
.form-container form p a{
   color:#177C16;
}
.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: crimson;
   color:#fff;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}
   
.container1 span {
	position: fixed;
	bottom: -50px;
	height: 30px;
	width: 30px;
	border-radius: 50%;
	background: linear-gradient(-135deg, green, white);
	animation: animate 10s linear infinite;
}
.container1 span:nth-child(1) {
	left: 90%;
	animation-delay: .5s;
	height: 50px;
	width: 50px;
}
.container1 span:nth-child(2) {
	left: 91%;
	animation-delay: 3s;
	height: 60px;
	width: 60px;
}
.container1 span:nth-child(3) {
	left: 95%;
	animation-delay: 2s;
	height: 80px;
	width: 80px;
}
.container1 span:nth-child(4) {
	left: 96%;
	animation-delay: 5s;
}
.container1 span:nth-child(5) {
	left: 97%;
	animation-delay: 1s;
}
.container1 span:nth-child(6) {
	left: 98%;
	animation-delay: 7s;
	height: 90px;
	width: 90px;
}
.container1 span:nth-child(7) {
	left: 99%;
	animation-delay: 6s;
	height: 120px;
	width: 120px;
}
.container1 span:nth-child(8) {
	left: 94%;
	animation-delay: 8s;
}
.container1 span:nth-child(9) {
	left: 93%;
	animation-delay: 6s;
	height: 50px;
	width: 50px;
}
.container1 span:nth-child(10) {
	left: 92%;
	animation-delay: 4s;
}
@keyframes animate {
	0% {
		bottom: 0%;
		margin-left: 90px;
		margin-right: 0px;
	}
	20% {
		bottom: 20%;
		margin-left: 0px;
		margin-right: 90px;
	}
	40% {
		bottom: 40%;
		margin-left: 90px;
		margin-right: 0px;
	}
	60% {
		bottom: 60%;
		margin-left: 0px;
		margin-right: 90px;
	}
	80% {
		bottom: 80%;
		margin-left: 90px;
		margin-right: 0px;
	}
	100% {
		bottom: 100%;
		margin-left: 0px;
		margin-right: 90px;
	}
}
   </style>
</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h3>Register now</h3> <br>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

      <input type="text" name="name" required placeholder="enter your name"class="form-container">
      <input type="email" name="email" required placeholder="enter your email"class="form-container">
      <input type="password" name="password" required placeholder="enter your password"class="form-container">
      <input type="password" name="cpassword" required placeholder="confirm your password"class="form-container">
      <select name="user_type"class="form-container">
         <option value="admin">Admin</option>
         <option value="doctor">Doctor</option>
         <option value="patient">Patient</option>


      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Already have an account? <a href="login.php"> <b> Login </b></a></p>
   </form>
</div>
<div class="container1">
        <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
	</div>
</body>
</html>