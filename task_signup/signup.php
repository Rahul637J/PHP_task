<?php 
session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$address= $_POST['address'];
		$phone_no=$_POST['phone_no'];
		

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			//save to database
			$user_id = random_num(20);
			$query = "insert into userss (user_id,user_name,password,address,phone_no) values ('$user_id','$user_name','$password','$address','$phone_no')";

			// $query = "INSERT INTO userss (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{
		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{
		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
            <label>Email: </label><input id="text" type="text" name="user_name"><br><br>
			<label>Password: </label><input id="text" type="password" name="password"><br><br>
			<label>Address: </label><input id="text" type="text" name="address"><br><br>
			<label>Phone NO: </label><input id="text" type="text" name="phone_no"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>