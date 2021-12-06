<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "p143a365", "EMeiza7u","p143a365");
	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$deletedUsers = $_POST['delete'];
	
	for($i=0; $i < count($deletedUsers); $i++){
		$row = $deletedUsers[$i];
		$id = $row["user_id"];
		$postID = $row["post_id"];
		
		$deletePostQuery = "DELETE FROM Posts WHERE post_id = '$id' ";
		
		if ($result = $mysqli->query($deletePostQuery)) {
			echo "deleted post " . $postID . "<br>";
		}
	}
?>