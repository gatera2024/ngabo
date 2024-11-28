<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home | IMS</title>
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
		}
  h1{
  	background-color: #0d4f5f;
    color: white;
    width: 100%;
    margin-top: 20px;
    text-align: center;
  }
  div{
  	width: 100%;
  	background-color: aliceblue;
  	height: fit-content;
  	display: flex;
   	justify-content:center;
  	text-align: center;
  	align-items: center;
  	gap: .5rem;
  	height: 80vh;

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
		<div class="middle">
			<h2>WELCOME TO INVENTORY MANAGEMENT SYSTEM</h2>
		</div>
	</section>
</body>
</html>