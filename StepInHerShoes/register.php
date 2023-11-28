<!DOCTYPE html>
<html>
	<head>
		<title>User Login and Registration</title>
		<link rel = "stylesheet" type = "text/css" href = "style.css" media = all>
		<link rel = "stylesheet" type = "text/css" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	</head>
	<body>
		<div class = "container">
			<div class = "login-box">
				<div class = "row">
					<div class = "col-md-8 login-left">
						<h2> Login here </h2>
						<form method = "post" onsubmit="return validate()">
							<div class = "form-group">
								<label>Username:</label>
								<input type = "text" name = "user" class ="form-control" required>
							</div>
							<div class = "form-group">
								<label>Password:</label>
								<input type = "password" name = "password" class ="form-control" required>
							</div>
							<button type = "submit" class = "btn btn-primary" name = "sub" id = "sub"> Login </button>
							<br>
							<label>Do not have a account??</label>
							<a href = "Sign Up.php">Register here</a>
						</form>
						<?php
							function dbcheck(){
								$servername="localhost";
								$username="root";
								$password="";
								$dbname="women_dev";
								$conn=new mysqli($servername,$username,$password,$dbname);
								if($conn->connect_error){
									die("Connection failed: " .$conn->connect_error);
								}
								$usern=$_POST["user"];
								$pass=$_POST["password"];
								$sql="Select password,email from women_users where username=\"".$usern."\"";
								$result=$conn->query($sql);
								if($result->num_rows == 0){
									echo "Username does not exist!";
								}
								else{
									$row=$result->fetch_assoc();
									if($pass != $row["password"]){
										echo "Username and password does not match!";
									}
									else{
										/*$sql="Insert into logged values(".$contact.")";
										$conn->query($sql);
										*/
										session_start();
										$_SESSION["email"]=$row["email"];
										header("Location: http://localhost/project files/admin.html");
									}
								}
								$conn->close();
							}
							if(isset($_POST["sub"])){
								dbcheck();
							}
							?>

					</div>

					
				</div>
			</div>
		</div>	
	</body>

	<script type="text/javascript">
		function validate(){
			var x=document.forms["login"]["user"].value;
			if(x == ""){
				alert("Please enter username");
				return false;
			}
			x=document.forms["login"]["pass"].value;
			if(x == ""){
				alert("Please enter password");
				return false;
			}
		}
	</script>

</html>