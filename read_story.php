<?php
	include("db_connection.php");
	if (!isset($_SESSION['login_user'])) {
		$_SESSION['read_story'] = "read_story_file";
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
		.navigation ul {
			list-style-type: none;
			padding: 0;
			margin: 0;
		}


		.navigation li {
			display: inline;
			margin-right: 10px;
		}
		.navigation h2{
			display:inline;
		}
		.navigation a {
			text-decoration: none;
			padding:2px;
			color:#bff7b7;
			font-size:40px;
		}
		div{
			padding:5px;

		}
		div h1{
			color:red;
		}

	</style>
</head>

<body>
    <header class="header" >
        <h1>Interactive Storytelling Platform</h1><br>
		<nav class="navigation">
			<ul>
				<li><h1 style="display:inline;"> <?php echo $_SESSION['login_user']; ?></h1></li>
				<li><a style="padding-left:20px;" target="" href="index.php">Home</a></li>
			</ul>
		</nav>
    </header>
	<br>
    <div class="content">
	
	<?php
	
		$sql="SELECT * FROM story ";
		$result = mysqli_query($conn, $sql);
		$cnt=mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);

		if($cnt>0){
			$startid=$row["id"];
			$endid=$startid+$cnt;
			for($x=$startid;$x<$endid;$x++){
				
				$sql="SELECT content FROM story WHERE id=$x";
				$result=mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($result);
				echo"<h1> Interactive Story : ". $x. "</h1><br>";
				echo "<h3>". $row["content"]." </h3>";
				$node_id=$x;
				$_SESSION['node_id']=$node_id;
				$_SESSION['story_no']=$x;
				echo"<nav class=\"navigation\">";
				echo"<ul>";
				echo"<h2>Path1 : </h2>";
				echo"<li><a target=\"\" href=\"first_option.php\"> ";  

				$sql="SELECT * FROM choices WHERE node_id=$x";
				$result=mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($result);
				if (mysqli_num_rows($result) > 0) {
					echo$row["first_option"];
				}

				echo"</a></li>";
				echo"<h2>Path2 : </h2>";
				echo"<li><a target=\"\" href=\"second_option.php\"> ";

				$sql="SELECT * FROM choices2 WHERE node_id=$x";
				$result=mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($result);
				if (mysqli_num_rows($result) > 0) {
					echo$row["second_option"];
				}

				echo"</a></li>";
				echo"</ul></nav>";
				
				echo"</div>"; 

			}
		}	
		else{
			echo"<div><h1>Please write a story! There not exist any story</h1></div>";
			echo " <div style=\"font-size:25px;\"><ul><li><a target=\"\" href=\"create_story.php\"> Write Story </a></li></ul></div> ";
		}
	?>
	
    </div>

    <footer class="footer">
        <p>© 2024 Iqbal Hossain. All rights reserved.</p>
    </footer>
</body>

</html>
