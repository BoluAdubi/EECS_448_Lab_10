<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "p143a365", "EMeiza7u","p143a365");
  /* check connection */
  if ($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $user = $_POST["userid"];
  $insertUser =  "INSERT INTO Users VALUES ('$user')";
  $checkDuplicate = "SELECT user_id FROM Users WHERE user_id = '$user' ";
  $duplicate = $mysqli->query($checkDuplicate);

  if( !isset($user) || trim($user) == ''){
    echo "User field cannot be empty<br>";
	echo "New user was not stored in the database";
  }
  else if(mysqli_num_rows($duplicate) > 0 ){
    echo "User already exists<br>";
	echo "New user was not stored in the database";
  }
  else{
    if( $result = $mysqli->query($insertUser) ){
      echo "New user successfully stored in the database";
	}
  }

  $mysqli->close();
?>
