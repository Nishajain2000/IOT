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
			<h3 style="text-align: center;margin-bottom: 40px;">admin login</h3>
			<input type="text" name="aname" placeholder="enter admin name"><br><br>
			<input type="password" name="pass" placeholder="password"><br><br>
			<input type="submit" name="submit" value="submit"><br><br>
			<a href="admin.php">admin registeration</a>
		</form>
		<?php
		   require 'adminconn.php';
		   if(isset($_POST['submit']))
		   {
		   	 $aname=$_POST['aname'];
		   	 $pass=$_POST['pass'];
				$accept=mysqli_query($conn,"SELECT * FROM adminr WHERE name='$aname' AND password='$pass'");
			    $number=mysqli_num_rows($accept);
			    if($number==1)
			    {
			      session_start();
			      $row=mysqli_fetch_assoc($accept);
			      $userid=$row['id'];

			      echo"<script>";
			      echo "document.location.replace('./publish.php')";
			      echo"</script>";

		     	}
		   }
		?>
	</body>
</html>