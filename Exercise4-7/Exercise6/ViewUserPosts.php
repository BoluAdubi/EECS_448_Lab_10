<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "p143a365", "EMeiza7u","p143a365");
	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$user = $_POST["userid"];
	
	$query = "SELECT * FROM Posts WHERE author_id = '$user'";
	
	if ($result = $mysqli->query($query)) {
		/* fetch associative array */
		while ($row = $result->fetch_assoc()) {
			echo $row["content"] . "<br>";
		}
		
		/* free result set */
		$result->free();
	}
	
	/* close connection */
	$mysqli->close();
?>