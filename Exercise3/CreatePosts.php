<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "p143a365", "EMeiza7u","p143a365");
	/* check connection */
	if ($mysqli->connect_errno){
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$user = $_POST["userid"];
	$post = $_POST["post"];

	$insertPost =  "INSERT INTO Posts (content, author_id) VALUES ('$post', '$user')";

	$checkExists = "SELECT user_id FROM Users WHERE user_id = '$user' ";
	$isUser = $mysqli->query($checkExists);
	

	if( !isset($user) || trim($user) == ''){
    echo "User field cannot be empty<br>";
	echo "New post was not saved<br>";
	}
	else if( !isset($post) || trim($post) == ''){
	  echo "Post cannot be empty<br>";
	  echo "New post was not saved<br>";
	}
	else if(mysqli_num_rows($isUser) > 0 ){
		if( $wasInserted = $mysqli->query($insertPost) ){
			echo "New post successfully saved<br>";
		}
	}
	else{
		echo "You need to be an existing user to save a post<br>";
		echo "New post was not saved<br>";
	}

  $mysqli->close();
?>
