<!DOCTYPE html>
<html>
	<head>
		<title>Inspiring Blogs</title>
		<link rel = "stylesheet" type = "text/css" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<style>
			body{
				background-image: url('blogs.jpg');
				/*background-repeat: no-repeat;*/
				background-size: cover;
			}
			table {
				border-collapse: collapse;
				width: 100%;
				color: white;
				font-family: cursive;
    			font-style: italic;
				font-size: 20px;
				text-align: left;
			}
			th {
				font-size: 25px;
				text-align: center;
				background-color: #ff1a75;
				color: white;
			}
			h1{
 			   font-family: cursive;
    			font-style: italic;
    			text-align: center;
    			font-size: 50px;
    			color : #ff1a75;
			}
			.button {
 				background-color:black;
    			border: none;
    			color: white;
    			padding: 15px 32px;
    			text-align: center;
    			text-decoration: none;
    			display: inline-block;
    			font-size: 16px;
			    margin: 4px 2px;
    			cursor: pointer;
    			margin-top: 30px;
			}
			.search{
				padding: 30px;
				font-family: cursive;
				font-size: 20px;
				display: flex;
				flex-direction: row; 
			}
			/*tr:nth-child(even) {background-color: #f2f2f2}*/
		</style>
	</head>
	<body>
		<h1>#SheInspires</h1>
		<!--<center>
				<form method = "POST" >
					<div class = "row search">
						<div class = "col-md-4">
							<label>Month:</label>
						</div>
						<div class = "col-md-4">
							<input type = "text" name = "user" class ="form-control">
						</div>
						<div class = "col-md-4">
							<button type = "submit" class = "btn btn-primary" name = "submit"> Search </button>
						</div>
					</div>
				</form>
			</div>
			</center>-->

		,<table>
			<tr>
				<th>Serial Number</th>
				<th>Beautiful Thoughts</th>
			</tr>
			<?php
				$conn = mysqli_connect("localhost", "root", "", "women_dev");
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$sql = "SELECT inspiring_blogs FROM women_users  ORDER BY user_id asc ";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$i = 1;
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>" . $i. "</td><td>" . $row["inspiring_blogs"] ."</td></tr>";
						$i = $i + 1;
					}
					echo "</table>";
				} else { echo "0 results"; }
				$conn->close();
			?>
		</table>
	</body>
</html>
