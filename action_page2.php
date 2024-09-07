<?php

	include("db_connection.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") {
		$firstoption = mysqli_real_escape_string($conn,$_POST['first']); 
		$secondoption = mysqli_real_escape_string($conn,$_POST['second']);	
		unset($_POST['first']);
		unset($_POST['second']);	
						
		$id=$_SESSION['root'];
		if (isset($_POST['bntsave'])) {
			$sql="INSERT INTO choices (node_id,first_option) VALUES('$id','$firstoption'),('$id','$secondoption')";
			if(mysqli_query($conn, $sql)){
				$_SESSION['root']=$id;
				header("location: choices_explore.php");
			}
			else{
				echo "ERROR: ! Sorry $sql. " . mysqli_error($conn);
			}
		}
		else{
			$sql="UPDATE choices SET end_node=TRUE WHERE id=$id";
			$rst = mysqli_query($conn, $sql);
			unset($_SESSION['root']);
			header("location: choices_explore.php");
		}
	}
	
?>