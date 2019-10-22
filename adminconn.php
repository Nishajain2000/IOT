<?php
	$conn=mysqli_connect('localhost','root','','classtest');
	if(!$conn)
	{
		echo $conn->error;
	}
?>