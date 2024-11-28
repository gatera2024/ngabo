<?php 
ob_start();
 ?>
<?php $connect = mysqli_connect('localhost','root','','invetory_management'); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Account</title>
</head>
<style type="text/css">
	 h1{
  	background-color: #0d4f5f;
    color: white;
    width: 100%;
    margin-top: 20px;
    text-align: center;
  }
  .form{
  	 width: 400px;
    padding: 20px;
    height: 300px;
    background-color: aliceblue;
    box-shadow: 2px 2px 5px black;
    margin: 0 20px ;
    position: relative;
    left: 30%;
    text-align: center;
  }
  form input{
  margin-top: 15px;
    padding: 8px;
    border-radius: 30px;
    border: 1px solid gray;
    outline:  none;
    align-self: center;
  }
  form input[type=submit]{
    padding: 8px;
    border-radius: 10px;
    cursor: pointer;
    border: 1px solid black;
    outline: none;
    font-weight: bold;
    background: linear-gradient(190deg,aliceblue,cadetblue);
    color: white;
    transition: .5s ease;
    font-size: 12px;
    width: 300px;
    position: relative;
    top: 10px;
    left: 5%;
}
form input[type=submit]:hover{
    background: linear-gradient(190deg,cadetblue,lightblue);
    color: black;
    
}
</style>
<body>
	<header>
		<a href="login.php" style="text-decoration: none;"><h1>INVENTORY MANAGEMENT SYSTEM</h1></a>
	</header>
	<div class="form">
		<h2>Create Account</h2>
	<h3><i>Fill the form with correct information</i></h3>
	<form method="post">
		<?php 
		if (isset($_POST['signup'])) {
			$name = $_POST['username'];
			$pass = $_POST['password'];

			$query = mysqli_query($connect,"INSERT INTO user VALUES('$name','$pass')");

			if ($query == true) {
				header('location:login.php');
			}
		}
		 ?>

		<label>Username: </label><input type="text" name="username" required><br>
		<label>Password: </label><input type="password" name="password" required><br>
		<input type="submit" name="signup" value="Create Account"><br><br>
    <a href="login.php">Click here if you already have an account</a><br>
    <a href="home.php">Go back home</a>
		
	</form>
	</div>
</body>
</html>
<?php 
ob_end_flush();
 ?>