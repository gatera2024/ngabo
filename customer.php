<?php
ob_start(); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Inventory Management System</title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;

		}
		header{
			display: flex;
			justify-content: space-around;
			flex-direction: column;
			align-items: center;
			border-bottom: 1px solid black;
			margin-bottom: 50px;
			box-shadow: 0px 5px 8px gray;
			padding: 20px;
    background-color: aliceblue;

		}
		header nav ul{
			list-style: none;
			margin: 2px;
			display: flex;
		}
		header nav ul li{
			margin: 2px 10px;
			padding: 5px 20px;
			border-radius:18px;
		}
		header nav ul li a{
			text-decoration: none;
			color: black;
			font-size: 18px;
			transition: .5s ease;
		}
		header nav ul li a:hover{
			letter-spacing: 1px;
			color: crimson;
		}
		section{
			display: flex;
			justify-content: space-around;
			gap: 2.5rem;
		}
	form{
		text-align: center;
   width: 300px;
    padding: 20px;
    height: auto;
    background-color: aliceblue;
    box-shadow: 2px 2px 5px black;
    margin: 20px 10px;
		}
		form input{
			padding: 2px 10px;
			margin: 5px 5px;
		}
		table{
			margin-top: 20px;
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    border: 1px solid #ddd;
		}
		th{
    background-color: aliceblue;
		}
		th, td {
    text-align: center;
    padding: 5px 1px;
  }
  h1{
  	background-color: #0d4f5f;
    color: white;
    width: 100%;
    margin-top: 20px;
    text-align: center;
  }
	</style>
</head>
<body>
	<header>
		<h1>INVENTORY MANAGEMENT SYSTEM</h1>
		<nav>
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="customer.php">Customer</a></li>
			<li><a href="customerReport.php">CustomerReport</a></li>
			<li><a href="salesman.php">Salesman</a></li>
			<li><a href="order.php">Orders</a></li>
			<li><a href="dateReport.php">DateReport</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		</nav>
	</header>
	<section>
		<div class="form">
		<form method="post">
			<?php
	$conn = mysqli_connect("localhost", "root", "", "invetory_management");

	// Form submission
	if (isset($_POST['add'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$grade = $_POST['grade'];
		$salesman_id = $_POST['salesman_id'];

		$sql = "INSERT INTO customer VALUES ('$id', '$name', '$city', $grade, '$salesman_id')";
		$insert=mysqli_query($conn, $sql);
		if ($insert==true) {
			header('location:customer.php');
		}
	}
?>

			<label>Customer Name:</label>
			<input type="text" name="name" required><br>
			<label>City:</label>
			<input type="text" name="city" required><br>
			<label>Grade:</label>
			<input type="number" name="grade" required><br>
			<label>Salesman ID:</label>
			<input type="text" name="salesman_id" required><br>
			<input type="submit" name="add" value="Add">
		</form>
	</div>
	<div class="table">
		<h1>Customers</h1>
		<?php
	$sql = "SELECT * FROM customer";
	$result = mysqli_query($conn, $sql);
?>

<table border="1px">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>City</th>
		<th>Grade</th>
		<th>Salesman ID</th>
		<th colspan="2">Action</th>
	</tr>
	<?php while ($row = mysqli_fetch_assoc($result)) { ?>
	<tr>
		<td><?php echo $row['CUSTOMER_ID']; ?></td>
		<td><?php echo $row['CUST_NAME']; ?></td>
		<td><?php echo $row['CITY']; ?></td>
		<td><?php echo $row['GRADE']; ?></td>
		<td><?php echo $row['SALESMAN_ID']; ?></td>
		<td><a href="customer.php?update=<?php echo $row['CUSTOMER_ID']; ?>">Update</a></td>
		<td><a href="customer.php?delete=<?php echo $row['CUSTOMER_ID']; ?>">Delete</a></td>
	</tr>
	<?php } ?>
</table>
	</div>

	<div class="form">
		<form method="post">
			<?php
if (isset($_GET['update'])) {
	
		$id = $_GET['update'];1

	$sql = "SELECT * FROM customer WHERE CUSTOMER_ID='$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$city = $_POST['city'];
		$grade = $_POST['grade'];
		$salesman_id = $_POST['salesman_id'];

		$sql = "UPDATE customer SET CUST_NAME='$name',CITY='$city',GRADE=$grade,SALESMAN_ID='$salesman_id' WHERE CUSTOMER_ID='$id'";
		$update=mysqli_query($conn, $sql);
		if ($update == true) {
			header('location:customer.php');
		}

	}

?>

			<label>Customer Name:</label>
			<input type="text" name="name" value="<?php echo $row['CUST_NAME']; ?>" required><br>
			<label>City:</label>
			<input type="text" name="city" value="<?php echo $row['CITY']; ?>" required><br>
			<label>Grade:</label>
			<input type="number" name="grade"  value="<?php echo $row['GRADE']; ?>"required><br>
			<label>Salesman ID:</label>
			<input type="text" name="salesman_id" value="<?php echo $row['SALESMAN_ID']; ?>" required><br>
			<input type="submit" name="update" value="Update">
		</form>
	<?php } ?>
	</div>
	</section>
</body>
</html>
<?php 
ob_end_flush();
 ?>
