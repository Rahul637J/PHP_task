<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        // read from database
        $query = "SELECT * FROM userss WHERE user_name = '$user_name' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] === $password) {
                $_SESSION['user_id'] = $user_data['user_id'];

                // Successful login - Display pop-up and redirect to index.php
                echo "<script>alert('Login successful!'); window.location.href='index.php';</script>";
                die;
            } else {
                echo "<script>alert('Wrong username or password!');</script>";
            }
        } else {
            echo "<script>alert('Wrong username or password!');</script>";
        }
    } else {
        echo "<script>alert('Please enter valid username and password!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
		font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif

	}

	#login{
		text-decoration: none;
		color: wheat;
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
		height: 35px;
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
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name" placeholder="email" required><br><br>
			<input id="text" type="password" name="password" placeholder="password" required><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<h4>Not registered ?</h4><a href="signup.php" id="login">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>