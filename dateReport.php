<?php ob_start();;
	$conn = mysqli_connect("localhost", "root", "", "invetory_management"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customers | Inventory</title>
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
			<h2>Choose The Date</h2>
		<form method="post">
            <label>Dates</label>
            <select name="date">
              <?php
              $se = mysqli_query($conn,"SELECT *FROM orders");
              while ($row = mysqli_fetch_array($se)) {
               ?>
               <option value="<?php echo $row['ORD_DATE'];?>"><?php echo $row['ORD_DATE']; ?></option>
             <?php } ?>
            </select>
          <div class="input-box button">
              <input style="cursor: pointer;" type="submit" name="generate" value="Generate Report">
          </div>			
		</form>
		</div>
<div class="table">
			<table>
				<tr>
					<th colspan="5">Report</th>
				</tr>
				<tr>
					<th>No</th>
					<th>Order Date</th>
					<th>Customer</th>
					<th>Purchase Amount</th>
					<th>Salesman</th>
				</tr>
				<?php
				if (isset($_POST['generate'])) {
				$date = $_POST['date'];
				$generation = mysqli_query($conn,"SELECT *FROM orders WHERE ORD_DATE='$date'");
				if ($generation == true) {
					echo "<div id='snackbar'>Report Generation: Completed</div>";
				 ?>
				<?php while ($row=mysqli_fetch_array($generation)){
					$n=0;
				?><tr>
						<td><?php echo $n+=1;?></td>
						<td><?php echo $row['ORD_DATE'];?></td>
						<td><?php $r=$row['CUSTOMER_ID']; 
						$cus=mysqli_query($conn,"SELECT *FROM customer WHERE CUSTOMER_ID=$r");
						$ro= mysqli_fetch_array($cus);
						echo $ro['CUST_NAME'];?></td>
						<td><?php echo $row['PURCH_AMT'];?></td>
						<td><?php $r=$row['SALESMAN_ID']; 
						$cus=mysqli_query($conn,"SELECT *FROM salesman WHERE SALESMAN_ID=$r");
						$ro= mysqli_fetch_array($cus);
						echo $ro['NAME'];?></td>
					</tr><?php }}} else{ ?>
						 <tr>
				 	<td colspan="5" style="background: lightpink; color: white;border-bottom-right-radius: 25px;
		border-bottom-left-radius: 25px;">No Report Generated</td>
				 </tr>
				<?php } ?>
			</table></div>
</body>
</html>