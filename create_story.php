<?php
	session_start();
	if (!isset($_SESSION['login_user'])) { // If not logged
		header("location: login.php");
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
	
	div{
		text-align:center;
	}
	button {
		 background-color: #04AA6D;
		 color: white;
		 padding: 14px 20px;
		 margin: 8px 0;
		 border: none;
		 cursor: pointer;
		 width: 10%;
	}
	.end{
		background-color: red;
		 color: white;
		 padding: 14px 20px;
		 margin: 8px 0;
		 border: none;
		 cursor: pointer;
		 width: 10%;
	}
	.writefield{
		background-color:#f7f2f2;
		color:red;
		font-size:25px;
	}
	input{
		height:40px;
		width:320px;
		color:red;
	}
	</style>
</head>

<body>
    <header class="header" >
        <h1>Interactive Storytelling Platform</h1><br><br>
		<nav class="navigation">
			<ul>
				<li><h2 style="display:inline;"> <?php echo $_SESSION['login_user']; ?></h2></li>
				<li><a style="padding-left:20px;" target="" href="index.html">Home</a></li>
			</ul>
		</nav>
    </header><br>
	
    <div >
		<h2>Enter the Story Content</h1>
		
		<form action="action_page.php" method="POST">
			<textarea class="writefield" placeholder="Write Here." rows="4" cols="60" name="content"> </textarea><br>
			
			<h3>Set Decision Content!</h3>
			
			<label ><b>option 1:</b></label>
			<input type="text" placeholder="Write Here" name="first" required>

			<label ><b>option 2:</b></label>
			<input type="text" placeholder="Write Here" name="second" required>

			
			<button class="save" type="submit" name="bntsave" >Next!</button> <br>
		</form>
    </div>

    <footer class="footer">
        <p>© 2024 Iqbal Hossain. All rights reserved.</p>
    </footer>
</body>

</html>


