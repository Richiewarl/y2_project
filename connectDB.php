<?php
	$testMsgs = true; //true = On, false = Off
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$database = "Y2Poject";

	// Create Connection
	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check Connection
	if (!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}

	echo ("Connected Successfully!");

	// Create project database
	$sql = "CREATE DATABASE Y2Poject";
	doSQL($conn, $sql, $testMsgs);

	// Delete entire database
	/*$sql = "DROP TABLE Y2Poject";
	doSQL($conn, $sql, $testMsgs);*/

	// Create columns for database
	$sql = "
		CREATE TABLE Y2Poject (
			userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(30) NOT NULL UNIQUE,
			password VARCHAR(128) NOT NULL,
			games INT(6) DEFAULT 0,
			snakes INT(6) DEFAULT 0,
			ladders INT(6) DEFAULT 0
		)
	";
	doSQL($conn, $sql, $testMsgs);

	$psw = password_hash("test", PASSWORD_DEFAULT);

	// Initial test data
	/*$sql = "INSERT INTO Y2Poject (username, password) VALUES ('test', '$psw')";
	doSQL($conn, $sql, $testMsgs);*/

	// Obtain all data from database
	$sql = "SELECT * FROM Y2Poject";
	$records = $conn->query($sql);

	// Create table for output
	$output = "<table border='2'>
				<th>User ID</th>
				<th>username</th>
				<th>password</th>
				<th>games</th>
				<th>snakes</th>
				<th>ladders</th>";

	// Enter data into respective columns
	while ($row = $records->fetch_assoc())
	{
		$output .= "<tr>
						<td>$row[userId]</td>
						<td>$row[username]</td>
						<td>$row[password]</td>
						<td>$row[games]</td>
						<td>$row[snakes]</td>
						<td>$row[ladders]</td>
					</tr>";
	}

	$output .= "</table>";
	// Output table
	echo ($output);

	// Function to connect to DB and output errors
	function doSQL($conn, $sql, $testMsgs)
	{
		if($testMsgs)
		{
			echo ("<br><code>SQL: $sql</code>");
			if ($result = $conn->query($sql))
				echo("<code> - OK</code>");
			else
				echo ("<code> - FAIL! " . $conn->error . " </code>");
		}
		else
			$result = $conn->query($sql);
		return $result;
	}

?>
