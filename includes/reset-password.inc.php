<?php

if(isset($_POST['reset-password-submit'])){
	$selector = $_POST['selector'];
	$validator = $_POST['validator'];
	$pwd = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];

	echo $selector;
	echo $validator;
	echo $pwd;
	echo $passwordRepeat;

	if(empty($password) || empty($passwordRepeat)){
		header("location: ../create-new-password.php?newpwd=empty");
		exit();
}elseif ($password != $passwordRepeat) {
	header("location: ../create-new-password.php?newpwdsame");
	exit();
}else{

}

$currentDate = date("u");

require '../connect.php';

$sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
$stmt = mysql_stmt_init($db);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "There was an error";
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
		mysqli_stmt_excute($stmt);

		$result = mysqli_stmt_get_result($stmt);
		if(!$row = mysqli_fetch_assoc($result)){
			echo "You need to re-submit your reset request."
			exit();
		}else{
			$tokenBin = hex2bin($validator);
			$tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

			if($tokenCheck == false){
				echo "You need to re-submit your reset request";
				exit();
			}elseif ($tokenCheck === true) {
				$tokenEmail = $row['pwdResetEmail'];

				$sql = "SELECT * FROM members WHERE email = ? "
				if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "Technical error, Can't fetch emails";
		exit();
	   }else{
	   	mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
	   	mysqli_stmt_excute($stmt);
	   	$result = mysqli_stmt_get_result($stmt);
		if(!$row = mysqli_fetch_assoc($result)){
			echo "Email you entered doesn't match our records"
			exit();
		}else{
			$sql = "UPDATE members SET password=? WHERE
			email = ?";
	$stmt = mysql_stmt_init($db);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "Can't update the password now";
		exit();
	}else{
		$newPwsHash = sha1($password);
		mysqli_stmt_bind_param($stmt, "ss", $newPwsHash, $tokenEmail);
		mysqli_stmt_excute($stmt);
		$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
	   $stmt = mysql_stmt_init($db);
	   if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "There was an error";
	    exit();
	   }else{
		mysqli_stmt_bind_param($stmt, "s", $userEmail);
		mysqli_stmt_excute($stmt);
		header("location: ../index2.php?newpwd=passwordupdated");
	  }

		}
	          }
			}
		}
	}
}
}else{
	header("location: ../index2.php");
}

?>