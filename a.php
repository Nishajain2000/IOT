<html>
	<head>
		<title>display</title>
	</head>
	<body>
		<?php
		session_start();
		if(isset($_SESSION['pid']))
		{
			require'adminconn.php';
			$id=$_SESSION['pid'];
			echo $id;
			$accept=mysqli_query($conn,"SELECT * FROM publish WHERE pid='$id'");
			$number=mysqli_num_rows($accept);
			while($row=mysqli_fetch_assoc($accept))
			{
				$title=$row['title'];

			}

		}
		?>
			 <form action="" method="POST" enctype="multipart/form-data">
			 	<input type="text" name="title" value="<?php  echo $title;?>"><br>
			 	<input type="file" name="image">
			 	<input type="submit" name="submit" value="submit">
			 </form>
			<?php
			error_reporting(0);
			if(isset($_POST['submit']))
			{
				$title=$_POST['title'];
				 $image1=$_files['image']['tmp_name'];
                 $binary1=fread(fopen($image,"r"),filesize($image1));
                 $picture1=base64_encode($binary1);
				$update=mysqli_query($conn,"UPDATE publish SET title='$title',image='$picture1' WHERE pid='$id'");
				if($update)
				{
					 echo "<script language='Javascript'>";
	                 echo "document.location.replace('./home.php')";
	                echo "</script>";
				}
				else
				{
					echo $conn->error;
				}
			}
		?>
	</body>
</html>