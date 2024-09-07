<?php 
	include("db_connection.php");
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
				<li><a style="padding-left:20px;" target="" href="index.php">Home</a></li>
			</ul>
		</nav>
    </header><br>
	
    <div >	
		<?php
	
			function set_choices() {
				global $conn;
				$sql="SELECT * FROM choices WHERE set_decision=FALSE";
				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result) > 0) {
					
					$row = mysqli_fetch_assoc($result); 
					$selfid=$row["id"];
					$parentid=$row["node_id"];
					$first_option=$row["first_option"];
						
					$_SESSION['root']=$selfid;
					$sql="UPDATE choices SET set_decision=TRUE WHERE id=$selfid";
					$rst = mysqli_query($conn, $sql);
						
					echo"<h3>Explore: =>  Frist Decision</h3>";
									
					echo "
						<form action=\"action_page2.php\" method=\"POST\">
							<textarea class=\"writefield\"  rows=\"2\" cols=\"60\" name=\"content\"> $first_option </textarea><br>
							<h3>Set Decision Content!</h3>
							
							<label ><b>option 1:</b></label>
							<input type=\"text\" placeholder=\"Write Here\" name=\"first\" >
							
							<label ><b>option 2:</b></label>
							<input type=\"text\" placeholder=\"Write Here\" name=\"second\" >
						
							<button class=\"save\" type=\"submit\" name=\"bntsave\" value=\"save\">Next!</button> <br>
							<button class=\"end\" type=\"submit\" name=\"btnend\" value=\"end\">End Path! </button>
						</form>";	

				}
				else{
					$sql="SELECT * FROM choices2 WHERE set_decision=FALSE";
					$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
							
							$row = mysqli_fetch_assoc($result);
							$selfid=$row["id"];
							$parentid=$row["node_id"];
							$second_option=$row["second_option"];
							$_SESSION['root']=$selfid;
							$sql="UPDATE choices2 SET set_decision=TRUE WHERE id=$selfid";
							$rst = mysqli_query($conn, $sql);
								
							echo"<h3>Explore: =>  Second Decision</h3>";
											
							echo "	
								<form action=\"action_page3.php\" method=\"POST\">
									<textarea class=\"writefield\"  rows=\"2\" cols=\"60\" name=\"content\"> $second_option </textarea><br>
									<h3>Set Decision Content!</h3>
									
									<label ><b>option 1:</b></label>
									<input type=\"text\" placeholder=\"Write Here\" name=\"first\" >

									<label ><b>option 2:</b></label>
									<input type=\"text\" placeholder=\"Write Here\" name=\"second\" >
								
									<button class=\"save\" type=\"submit\" name=\"bntsave\" value=\"save\">Next!</button> <br>
									<button class=\"end\" type=\"submit\" name=\"btnend\" value=\"end\">End Path! </button>
								</form>";	

						} 
						else{
							$sql="SELECT * FROM choices WHERE set_decision=FALSE";
							$result = mysqli_query($conn, $sql);
							$sql2="SELECT * FROM choices2 WHERE set_decision=FALSE";
							$result2 = mysqli_query($conn, $sql2);

							if (mysqli_num_rows($result) > 0 OR mysqli_num_rows($result2)>0) {
								header("location: choices_explore.php");
							}
							else{
								header("location: index.html");
							} 
						}
				}
			}
			set_choices();
		?>

    </div>

    <footer class="footer">
        <p>© 2024 Iqbal Hossain. All rights reserved.</p>
    </footer>  
</body>

</html>


