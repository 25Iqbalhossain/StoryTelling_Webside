

<?php
	include("db_connection.php");
	if(isset($_GET['link1'])){
		$id=$_SESSION['id1'];
		$sql="SELECT * FROM choices2 WHERE id=$id";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$end_node=$row["end_node"];
		if($end_node==TRUE){ // GAME END 
			
			
				echo " <html lang=\"en\">
				<head>
					<meta charset=\"UTF-8\">
					<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
					<title>StoryTelling Platform</title>
					<link rel=\"stylesheet\"type=\"text/css\" href=\"css/style.css\">
				</head>

				<body>
					<header class=\"header\" >
						<h1>Interactive Storytelling Platform</h1><br><br>
						<nav class=\"navigation\">
							<ul>
								<li><a target=\"\" href=\"read_story.php\">Read Story</a></li>
								<li><a target=\"\" href=\"create_story.php\">Create Story</a></li>
								<li><a target=\"\" href=\"index.php\">HOME</a></li>
							</ul>
						</nav>
					</header>
					<br>
					<div class=\"content\">
						<h1>" .$_SESSION['win1']. " </h1><br>
						<p style=\"color:red; font-size:35px;\">GAME END <p>

					</div>

					<footer class=\"footer\">
						<p>© 2024 Iqbal Hossain. All rights reserved.</p>
					</footer>
				</body>

				</html> "; 
			
			
			
		}
		else{
			unset($_SESSION['id1']);
			unset($_SESSION['id2']);
			$_SESSION['node_id']=$id;
			header("location: first_option.php");
		}
	}
	else{
		$id=$_SESSION['id2'];
		$sql="SELECT * FROM choices2 WHERE id=$id";
		//facing the problem when choose the option 2
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$end_node=$row["end_node"];
		if($end_node==TRUE){
						
				echo " <html lang=\"en\">
				<head>
					<meta charset=\"UTF-8\">
					<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
					<title>StoryTelling Platform</title>
					<link rel=\"stylesheet\"type=\"text/css\" href=\"css/style.css\">
				</head>

				<body>
					<header class=\"header\" >
						<h1>Interactive Storytelling Platform</h1><br><br>
						<nav class=\"navigation\">
							<ul>
								<li><a target=\"\" href=\"read_story.php\">Read Story</a></li>
								<li><a target=\"\" href=\"create_story.php\">Create Story</a></li>
								<li><a target=\"\" href=\"index.php\">HOME</a></li>
							</ul>
						</nav>
					</header>
					<br>
					<div class=\"content\">
						<h1>" .$_SESSION['win2']. " </h1><br>
						<p style=\"color:red; font-size:35px;\">GAME END <p>

					</div>

					<footer class=\"footer\">
						<p>© 2024 Iqbal Hossain. All rights reserved.</p>
					</footer>
				</body>

				</html> "; 
		}
		else{
			unset($_SESSION['id1']);
			unset($_SESSION['id2']);
			$_SESSION['node_id']=$id;
			header("location: first_option.php");
		}
	}
?>

