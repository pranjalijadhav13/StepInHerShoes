<!DOCTYPE html>
<html>
	<head>
		<title>Upcoming Event Details</title>
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
				text-align: center;
			}
			th {
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
				color: white;
			}
			.label{
				color: white;
			}
			/*tr:nth-child(even) {background-color: #f2f2f2}*/
		</style>
	</head>
	<body>
		<h1>Upcoming Events</h1>
		<center>
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
			</center>

		<table>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Description</th>
				 <th>Venue</th>
				<th>Date</th>
				<th>Email</th>
				<th>Phone No</th>
				<th>To Participate</th>
			</tr>
			<?php
				session_start();
				$conn = mysqli_connect("localhost", "root", "", "women_dev");
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				if(isset($_POST["submit"])&&$_POST["user"]!=null){
					$sql = "SELECT event_id, event_name, event_description, event_venue, event_date, Email, month, phone FROM events where month =\"". $_POST["user"]."\" ORDER BY event_date asc ";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						$i = 1;
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<tr><td>" . $i. "</td><td>" . $row["event_name"] . "</td><td>". $row["event_description"]. "</td><td>". $row["event_venue"]. "</td><td>". $row["event_date"]. "</td><td>". $row["Email"]. "</td><td>". $row["phone"]. "</td><td><a href='index.php'>Participate</a></td></tr>";
							$i = $i + 1;
						}
						echo "</table>";
					} else { echo "0 results"; }
				}
				else
				{
					$sql = "SELECT event_id, event_name, event_description, event_venue, event_date, Email, phone FROM events ORDER BY event_date asc";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						$i = 1;
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<tr><td>" . $i. "</td><td>" . $row["event_name"] . "</td><td>". $row["event_description"]. "</td><td>". $row["event_venue"]. "</td><td>". $row["event_date"]. "</td><td>". $row["Email"]. "</td><td>". $row["phone"]. "</td><td><a href='index.php'>Participate</a></td></tr>";
							$i = $i + 1;
						}
						echo "</table>";
					} else { echo "0 results"; }
				}
				$conn->close();
			?>
		</table>
	</body>
</html>
