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

	if (isset($_POST['add'])) {
		$city = $_POST['city'];
		$name = $_POST['name'];
		$commission = $_POST['commission'];

		$sql = "INSERT INTO salesman VALUES (null,'$name', '$city', $commission)";
		mysqli_query($conn, $sql);
	}
?>
			<label>Salesman Name:</label>
			<input type="text" name="name" required><br>
			<label>City:</label>
			<input type="text" name="city" required><br>
			<label>Commission:</label>
			<input type="number" name="commission" required><br>
			<input type="submit" name="add" value="Add">
		</form>
	</div>
	<div class="table">
		<h1>Salesman</h1>
		<?php
	$sql = "SELECT * FROM salesman";
	$result = mysqli_query($conn, $sql);
?>

<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>City</th>
		<th>Commission</th>
	</tr>
	<?php while ($row = mysqli_fetch_assoc($result)) { ?>
	<tr>
		<td><?php echo $row['SALESMAN_ID']; ?></td>
		<td><?php echo $row['NAME']; ?></td>
		<td><?php echo $row['CITY']; ?></td>
		<td><?php echo $row['COMMISSION']; ?></td>
		<td><a href="salesman.php?update=<?php echo $row['SALESMAN_ID']; ?>">Update</a></td>
		<td><a href="salesman.php?delete=<?php echo $row['SALESMAN_ID']; ?>">Delete</a></td>
	</tr>
	<?php } ?>
</table>

	</div>

	<div class="form">
		<form method="post">
			<?php
if (isset($_GET['update'])) {
	
		$id = $_GET['update'];

	$sql = "SELECT * FROM salesman WHERE SALESMAN_ID='$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$city = $_POST['city'];
		$commission = $_POST['commission'];

		$sql = "UPDATE salesman SET NAME='$name',CITY='$city',COMMISSION=$commission WHERE SALESMAN_ID='$id'";
		$update=mysqli_query($conn, $sql);
		if ($update == true) {
			header('location:salesman.php');
		}

	}

?>

			<label>Customer Name:</label>
			<input type="text" name="name" value="<?php echo $row['NAME']; ?>" required><br>
			<label>City:</label>
			<input type="text" name="city" value="<?php echo $row['CITY']; ?>" required><br>
			<label>Grade:</label>
			<input type="number" name="commission" value="<?php echo $row['COMMISSION']; ?>"required><br>
			<input type="submit" name="update" value="Update">
		</form>
	<?php } ?>
	</div>
	</section>
</body>
</html>
