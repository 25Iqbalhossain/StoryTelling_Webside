<?php

	include("db_connection.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (isset($_POST['bntsave'])) {
			$content = mysqli_real_escape_string($conn,$_POST['content']);
			$firstoption = mysqli_real_escape_string($conn,$_POST['first']); 
			$secondoption = mysqli_real_escape_string($conn,$_POST['second']);	
			
			$sql = "INSERT INTO story (title,content) VALUES('Interactive Story','$content')";
			if(mysqli_query($conn, $sql)){
				$sql="SELECT id FROM story WHERE content='$content'";
				$result = mysqli_query($conn,$sql);
				if(mysqli_num_rows($result) >0){ // found
					$row = mysqli_fetch_assoc($result);
					$id=$row["id"];
						
					$_SESSION['root'] = $id;
					$sql1="INSERT INTO choices (node_id,first_option) VALUES('$id','$firstoption')";
					$sql2="INSERT INTO choices2 (node_id,second_option) VALUES('$id','$secondoption')";
					if(mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)){
							
						$sql="SELECT id FROM choices WHERE node_id='$id'";
						$result = mysqli_query($conn,$sql);
						$row = mysqli_fetch_assoc($result);
						$id=$row["id"];
						$_SESSION['child1']=$id;
							
						$sql="SELECT id FROM choices2 WHERE node_id='$id'";
						$result = mysqli_query($conn,$sql);
						$row = mysqli_fetch_assoc($result);
						$id=$row["id"];
						$_SESSION['child2']=$id;
	
						header("location: choices_explore.php");
					}
				}
			} 
			else{
				echo "ERROR: ! Sorry $sql. " . mysqli_error($conn);
			}
		}
		else{
			header("location: index.html");
		}
	}
	
?>
