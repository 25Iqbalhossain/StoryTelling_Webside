<?php
	include("db_connection.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") {
   
      // username and password sent from form 
		$username = mysqli_real_escape_string($conn,$_POST['uname']);
		$password = mysqli_real_escape_string($conn,$_POST['psw']); 
		$email_id = mysqli_real_escape_string($conn,$_POST['email']);	
			
		$sql = "SELECT * FROM user WHERE email='$email_id'";
		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result) >0){ // found 
			$_SESSION['login_user'] = $username;
			
			if (isset($_SESSION['read_story']) ) {
				header("location: read_story.php");
			} else {
				header("location: create_story.php");
			} 

		}else{ // not found
		   $sql = "INSERT INTO user VALUES('$username','$email_id','$password')";
		   if(mysqli_query($conn, $sql)){
				// Registration Sucessfull
				$_SESSION['login_user'] = $username;
				if (isset($_SESSION['read_story']) ) {
					header("location: read_story.php");
				} else {
					header("location: create_story.php");
					
				}
			} else{
				echo "ERROR: ! Sorry $sql. " . mysqli_error($conn);
			}
		}

   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StoryTelling Platform</title>
    <link rel="stylesheet"type="text/css" href="css/style.css">
	
	<style>
		input[type=text], input[type=password] {
		  width: 25%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: block;
		  border: 1px solid #ccc;
		  box-sizing: border-box;
		  color:blue;
		}

		button {
		  background-color: #04AA6D;
		  color: white;
		  padding: 14px 20px;
		  margin: 8px 0;
		  border: none;
		  cursor: pointer;
		  width: 25%;
		}
		.container{
			padding-left:40%;
		}
		h2{
			padding:15px;
			padding-left:45%;
		}
		h3{
			color:#bff7b7;
			padding-left:25%;
		}
		button:hover {
		  opacity: 0.8;
		}	
	</style>
</head>

<body>
    <header class="header" >
        <h1>Interactive Storytelling Platform</h1>
		
    </header>

    <h2>Login</h2>
    <form action="" method="post">
	    <div class="container">
			<label for="uname"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="uname" required>

			<label for="email"><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="email" required>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>
			
			<button type="submit">Login</button> <br>
		</div>
		<h3>If already your Account is not registered, This form will automatically register your information!</h3>
	</form>
    <footer class="footer">
        <p>© 2024 Iqbal Hossain . All rights reserved.</p>
    </footer>
</body>

</html>
