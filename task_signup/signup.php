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
	body{
		margin-top: 100px;
		display: flex;
		flex-direction: column;
		background-color: maroon;
		gap: 50px;
		align-items: center;
		justify-content: center;
	}	
	div{
		font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
		width: fit-content;
	}
	#login{
		text-decoration: none;
		color: wheat;
		/* border: 2px solid; */
	}
	
	#text{
		height: 35px;
		border-radius: 5px;
		font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
		padding: 4px;
		border: solid thin #aaa;
		outline:none;
		width: 100%;
	}

	#button{
		padding: 10px;
		width: 100%;
		color: white;
		background-color: lightblue;
		font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
		border-radius: 10px;
		border: none;
		
	}

	#box{
		background-color: darkseagreen;
		margin: auto;
		width: 300px;
		padding: 20px;
		border-radius: 10px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
            <input id="text" type="text" name="user_name" placeholder="email"><br><br>
			 <input id="text" type="password" name="password" placeholder="password"><br><br>
			 <input id="text" type="text" name="address" placeholder="address"><br><br>
			 <input id="text" type="text" name="phone_no" placeholder="phone no"><br><br>

			<input id="button" type="submit" value="Signup"><br>

			<h4>Already have an account ?</h4><a href="login.php" id="login">Click to Login</a><br>
		</form>
	</div>
</body>
</html>