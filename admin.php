<html>
	<head>
		<title>admin page</title>
		<style>
			form{
				width: 30%;
				height:50%;
				margin-left:35%;
				background-image: linear-gradient(yellow,white);
				margin-top:10%;
			}
			input[type="text"],input[type="password"]{
				border:0;
				outline: 0;
				background:transparent;
				border-bottom:1px solid white;
				margin-left: 20%;
			}
			input[type="submit"]{
				width:20%;
				background-color: lime;
				margin-left: 20%;
			}
		</style>
	</head>
	<body>
		<form action="" method="POST" enctype="multipart/data-from">
			<br>
			<h3 style="text-align: center;margin-bottom: 40px;">admin registeration</h3>
			<input type="text" name="aname" placeholder="enter your name"><br><br>
			<input type="text" name="email" placeholder="enter email"><br><br>
			<input type="password" name="pass" placeholder="password"><br><br>
			<!--input type="file" name="image"><br><br-->
			<input type="submit" name="submit" value="submit">
			<br>
			<br>
			<a href="adminlogin.php">admin registeration</a>
		</form>
		<?php
		    error_reporting(0);
			require 'adminconn.php';
			if(isset($_POST['submit']))
			{
				$aname=$_POST['aname'];
				$email=$_POST['email'];
				$pass=$_POST['pass'];
				//$image=$_FILES['image']['tmp_name'];
				//$binary=fread(fopen($image,"r"),filesize($image));
				//$picture=base64_encode($binary)
			
				$insert=mysqli_query($conn,"INSERT INTO adminr(name,email,password)VALUES('$aname','$email','$pass')");
				if(!$insert)
				{
					echo $conn->error;
				}
			
			}
		?>
	</body>
</html>