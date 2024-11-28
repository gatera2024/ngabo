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
		$order_no = $_POST['order_no'];
		$purch_amt = $_POST['purch_amt'];
		$order_date = $_POST['order_date'];
		$customer_id = $_POST['customer_id'];
		$salesman_id = $_POST['salesman_id'];

		$sql = "INSERT INTO orders VALUES ('', $purch_amt, '$order_date', '$customer_id', '$salesman_id')";
		mysqli_query($conn, $sql);
	}
?>


			<label>Order No:</label>
			<input type="text" name="order_no" required><br>	
			<label>Purchase Amount:</label>
			<input type="number" name="purch_amt" required><br>	
			<label>Order Date:</label>
			<input type="date" name="order_date" required><br>	
			<label>Customer ID:</label>
			<input type="text" name="customer_id" required><br>	
			<label>Salesman ID:</label>
			<input type="text" name="salesman_id" required><br>	
			<input type="submit" name="add" value="Add">
		</form>
	</div>
	<div class="table">
		<h1>Orders</h1>
		<?php
	$sql = "SELECT * FROM orders";
	$result = mysqli_query($conn, $sql);
?>

<table>
	<tr>
		<th>Order No</th>
		<th>Purchase Amount</th>
		<th>Order Date</th>
		<th>Customer Id</th>
		<th>Salesman Id</th>
	</tr>
	<?php while ($row = mysqli_fetch_assoc($result)) { ?>
	<tr>
		<td><?php echo $row['ORD_NO']; ?></td>
		<td><?php echo $row['PURCH_AMT']; ?></td>
		<td><?php echo $row['ORD_DATE']; ?></td>
		<td><?php echo $row['CUSTOMER_ID']; ?></td>
		<td><?php echo $row['SALESMAN_ID']; ?></td>
		<td><a href="order.php?update=<?php echo $row['ORD_NO']; ?>">Update</a></td>
		<td><a href="order.php?delete=<?php echo $row['ORD_NO']; ?>">Delete</a></td>
	</tr>
	<?php } ?>
</table>

	</div>

	<div class="form">
		<form method="post">
			<?php
if (isset($_GET['update'])) {
	
		$id = $_GET['update'];

	$sql = "SELECT * FROM orders WHERE ORD_NO='$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if (isset($_POST['update'])) {
		$purch_amt = $_POST['purch_amt'];
		$order_date = $_POST['order_date'];
		$customer_id = $_POST['customer_id'];
		$salesman_id = $_POST['salesman_id'];

		$sql = "UPDATE salesman SET PURCH_AMT='$purch_amt',ORD_DATE='$order_date',CUSTOMER_ID=$customer_id,SALESMAN_ID=$salesman_id WHERE ORD_NO='$id'";
		$update=mysqli_query($conn, $sql);
		if ($update == true) {
			header('location:salesman.php');
		}

	}

?>
			<label>Purchase Amount:</label>
			<input type="number" name="purch_amt" value="<?php echo $row['PURCH_AMT']; ?>" required><br><br>	
			<label>Order Date:</label>
			<input type="date" name="order_date" value="<?php echo $row['ORD_DATE']; ?>" required><br><br>	
			<label>Customer ID:</label>
			<input type="text" name="customer_id" value="<?php echo $row['CUSTOMER_ID']; ?>" required><br><br>	
			<label>Salesman ID:</label>
			<input type="text" name="salesman_id" value="<?php echo $row['SALESMAN_ID']; ?>" required><br><br>	
			<input type="submit" name="update" value="Update">
		</form>
	<?php } ?>
	</div>
	</section>
</body>
</html>
