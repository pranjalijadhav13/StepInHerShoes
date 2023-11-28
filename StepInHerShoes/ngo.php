<!DOCTYPE html>
<html>
	<head>
		<title>NGO Page</title>
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
    			color: #ff1a75;
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
			/*tr:nth-child(even) {background-color: #f2f2f2}*/
		</style>
	</head>
	<body>
		<h1>NGO Details</h1>
		<center>
				<form method = "POST" >
					<div class = "row search">
						<div class = "col-md-4">
							<label>Location:</label>
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
				<th>Address</th>
				 <th>History</th>
				<th>Provide Jobs</th>
				<th>Phone No</th>
				<th>Location</th>
				
			</tr>
			<?php
				$conn = mysqli_connect("localhost", "root", "", "women_dev");
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				if(isset($_POST["submit"])&&$_POST["user"]!=null){
					$sql = "SELECT ngo_id, ngo_name, ngo_address, background_info,provide_employment,phone,ngo_location FROM ngo where ngo_location =\"". $_POST["user"]."\" ORDER BY ngo_id asc ";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						$i = 1;
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<tr><td>" . $i. "</td><td>" . $row["ngo_name"] . "</td><td>". $row["ngo_address"]. "</td><td>". $row["background_info"]. "</td><td>". $row["provide_employment"]. "</td><td>". $row["phone"]. "</td><td>". $row["ngo_location"] ."</td></tr>";
							$i = $i + 1;
						}
						echo "</table>";
					} else { echo "0 results"; }
				}
				else
				{
					$sql = "SELECT ngo_id, ngo_name, ngo_address, background_info, provide_employment,phone,ngo_location FROM ngo ORDER BY ngo_id asc";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						$i = 1;
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<tr><td>" . $i. "</td><td>" . $row["ngo_name"] . "</td><td>". $row["ngo_address"]. "</td><td>". $row["background_info"]. "</td><td>". $row["provide_employment"]. "</td><td>". $row["phone"]. "</td><td>". $row["ngo_location"];
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
