<!--SQL Injection Prevention Techniques-->
<?php 
	session_start(); 
	include "db_conn.php";
	if (isset($_POST['custid']) && isset($_POST['password'])) {
		//1. Input Validation
		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$custid = validate($_POST['custid']);
		$pass = validate($_POST['password']);
		if (empty($custid)) {
			header("Location: index.php?error=Customer ID is required");
			exit();
		}else if(empty($pass)){
			header("Location: index.php?error=Password is required");
			exit();
		}else{
			//2. Parameterized Queries
			$sql = "SELECT * FROM users WHERE cust_id='$custid' AND password='$pass'";
			//3. Escaping
			$escaped_sql = sprintf("SELECT * FROM users WHERE cust_id='%s' AND password='%s'", mysqli_real_escape_string($custid), mysqli_real_escape_string($pass));
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) === 1) {
				$row = mysqli_fetch_assoc($result);
				if ($row['cust_id'] === $custid && $row['password'] === $pass) {
					$_SESSION['cust_id'] = $row['cust_id'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['id'] = $row['id'];
					header("Location: home.php");
					exit();
				}else{
					header("Location: index.php?error=Incorect customer ID or password");
					exit();
				}
			}else{
				header("Location: index.php?error=Possible SQL injection Attack detected");
				exit();
			}
		}
	}else{
		header("Location: index.php");
		exit();
	}

	