<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Sign Up</title>
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body background="blogs.jpg">
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
<center>
</center>
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-body">
                    <h2 class="title">Sign Up</h2>
                    <form name="signup" method="POST" onsubmit="return validate()">
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Name" name="name" id="name">
                        </div>
                        <div class="input-group">
                           <input class="input--style-2" type="tel" placeholder="Age" name="age" id="age">
                        </div>
						            <div class="input-group">
							             <input class="input--style-2" type="tel" placeholder="Contact Number" name="contact" id="contact">
						            </div>
						            <div class="input-group">
							             <input class="input--style-2" type="email" placeholder="Email ID" name="email" id="email">
						            </div>
                        <div class="input-group">
                           <input class="input--style-2" type="tel" placeholder="Inspiring Stories" name="inspire" id="inspire">
                        </div>						
						            <div class="input-group">
							             <input class="input--style-2" type="text" placeholder="Username" name="user" id="user">
						            </div>	
						            <div class="input-group">
							             <input class="input--style-2" type="password" placeholder="Password" name="pass" id="pass">
						            </div>
                        <div class="p-t-30">
                            <input class="btn btn--radius btn--green" type="submit" value="Sign Up" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
<script type="text/javascript">
function validate(){
  var x = document.forms["signup"]["name"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
  x = document.forms["signup"]["age"].value;
  if (x == "") {
    alert("Age must be filled out");
    return false;
  }
  x = document.forms["signup"]["contact"].value;
  if (x == "") {
    alert("Contact must be filled out");
    return false;   
  }
  x = document.forms["signup"]["email"].value;
  if (x == "") {
    alert("Email ID must be filled out");
    return false;
  }
  x = document.forms["signup"]["user"].value;
  if (x == "") {
    alert("Username must be filled out");
    return false;
  }
  x = document.forms["signup"]["pass"].value;
  if (x == "") {
    alert("Password must be filled out");
    return false;
  }
}
</script>
<?php
function dbentry(){
$servername="localhost";
$username="root";
$password="";
$dbname="women_dev";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection failed: " .$conn->connect_error);
}
$name=$_POST["name"];
$age=$_POST["age"];
$phone=$_POST["contact"];
$inspiring_blogs =$_POST["inspire"];
$email=$_POST["email"];
$usern=$_POST["user"];
$pass=$_POST["pass"];

$sql="Insert into women_users(user_id, name, age , inspiring_blogs, phone, username, password, email) values(12, \"".$name."\",\"".(int)$age."\",\"".$inspiring_blogs."\",\"".(int)$phone."\",\"".$usern."\",\"".$pass."\",\"".$email."\")";
if($conn->query($sql) === TRUE){
	echo "<script type=\"text/javascript\"> alert(\"Sign Up successful\"); window.location.href=\"http://localhost/project files/admin.html\";</script>";
}
else{
	echo "Error" .$sql. "<br>" .$conn->error;
}
x:
$conn->close();
}
if(isset($_POST["submit"])){
	dbentry();
}
?>
</body>
</html>
<!-- end document-->