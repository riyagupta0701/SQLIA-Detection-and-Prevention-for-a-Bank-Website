<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>WELCOME TO R2S2 BANK!</h1>
    <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php 
		 	if (isset($_GET['error'])){ 
				?>
				<p class="error"><?php echo $_GET['error']; ?></p>
				<?php 
			} 
		?>
		<!--SQL Injection Detection Techniques-->
		<!--Input Type Checking and Pattern Matching-->
     	<label>Customer ID</label>
     	<input type="number" name="custid" pattern="^\d{7}$" placeholder="Customer ID" required="required"><br>
     	<label>Password</label>
     	<input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" placeholder="Password" required="required"><br>
     	<button type="submit">Login</button>
     </form>
</body>
</html>