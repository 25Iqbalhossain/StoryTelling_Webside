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

	</style>
</head>

<body>
    <header class="header" >
        <h1>Welcome & Enjoy Amazing Interactive Story</h1><br>
		<nav class="navigation">
			<ul>
				<li><h1 style="display:inline;"> <?php echo $_SESSION['login_user']; ?></h1></li>
				<li><a style="padding-left:20px;" target="" href="index.html">Home</a></li>
			</ul>
		</nav>
    </header>
	<br>
    <div class="content">
	
	<?php
		$node_id=$_SESSION['node_id'];
		$sql="SELECT * FROM choices2 where node_id=$node_id";
		
		$result = mysqli_query($conn, $sql);
		//$cnt=mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
		$id=$row["id"];
		
		if($row["end_node"]==TRUE){
				$SESSION['win1']=$row["second_option"];
				$_SESSION['id1']=$id;
				$_GET['Link1']=TRUE;
				header("location: right_tree.php");
		}

		$x=$_SESSION['story_no'];
		echo"<h3> Interactive Story : ". $x. "</h3><br>";
		echo "<h3>". $row["second_option"]." </h3>";
				
		echo"<nav class=\"navigation\">";
		
		
		echo"<ul>";
			$sql="SELECT * FROM choices2 WHERE node_id=$id";
			$result=mysqli_query($conn,$sql);
			unset($_SESSION['id1']);
			unset($_SESSION['id2']);
			while($row = mysqli_fetch_assoc($result)){					
				
						
				if(!isset($_SESSION['id1'])){
					$_SESSION['id1']=$row["id"];
				}
				else {
					$_SESSION['id2']=$row["id"];
				}
			}	
			$id1=$_SESSION['id1'];
			$id2=$_SESSION['id2'];
							
			$sql="SELECT * FROM choices2 WHERE id=$id1";
			$result=mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);
			//if (mysqli_num_rows($result) > 0) {
				echo"<h2>Path : A</h2>";
				echo"<li><a target=\"\" href=\"right_tree.php?link1\"> "; 						
				echo$row["second_option"];	
				$_SESSION['win1']=$row["second_option"];
				echo"</a></li>";
			//}
			//else{echo "ERROR: ! Sorry $sql. " . mysqli_error($conn);}
			
			$sql="SELECT * FROM choices2 WHERE id=$id2";
			$result=mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);
			//if (mysqli_num_rows($result) > 0) {
				echo"<h2>Path : B </h2>";
				echo"<li><a target=\"\" href=\"right_tree.php?link2\"> "; 						
				echo$row["second_option"];		
				$_SESSION['win2']=$row["second_option"];								
				echo"</a></li>";		
			//}
			//else{echo "ERROR: ! Sorry $sql. " . mysqli_error($conn);}

		echo"</ul></nav>";
	
	?>
	
    </div>

    <footer class="footer">
        <p>© 2024 Iqbal Hossain. All rights reserved.</p>
    </footer>
</body>

</html>
