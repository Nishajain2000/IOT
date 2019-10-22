<html>
   <head>
   	  <title>publish page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   	  <style>
   	  	ul{
   	  		list-style-type: none;
            margin-left: 10%;
   	  	 }
   	  	  li{
   	  	  	float: left;
   	  	  	padding-left: 10px;
   	  	  	border:1px solid black;
   	  	  	background-color: yellow;
   	  	  	text-align: center;
   	  	  	padding-right: 10px;
   	  	  	}

         form{
            width: 30%;
            height:100%;
            margin-left:10%;
            background-image: linear-gradient(yellow,white);
            margin-top:5%;
         }
         input[type="text"],input[type="password"],input[type="file"]{
            width:120%;
            border-bottom:1px solid white;
            margin-left: 20%;
         }
         textarea{
             border-bottom:1px solid white;
            margin-left: 20%;
         }
         input[type="submit"]{
            width:65%;
            height: 45px;
            background-color: lime;
            margin-left:30%;
         }
         label{
            padding-left: 30%;
         }
         
      </style>
   	  </style>
   </head>
   <body>
   		<ul>
   			<li><a href="publish.php">PUBLISH</a></li>
   			<li><a href="pid.php">MANAGE PUBLICATION</a></li>
   			<li><a href="logout.php">LOGOUT</a></li>
   		</ul>
         <br>
         <div class="div1">
            <form action="" method="POST" enctype="multipart/form-data">
               <br>
               <p style="text-align:center;">Make a publication</p>
               <div class="row">
                  <div class="col-md-2">
                     <label>Title</label>
                  </div>
                  <div class="col-md-7">
                     <input type="text" name="title">
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="col-md-2">
                     <label>Comment</label>
                  </div>
                  <div class="col-md-7">
                     <textarea name="comment" rows="10" cols="30"></textarea>
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="col-md-2">
                     <label>image</label>
                  </div>
                  <div class="col-md-7">
                     <input type="file" name="image">
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="col-md-2">
                     <label>Website link or contact</label>
                  </div>
                  <div class="col-md-7">
                     <input type="text" name="weblink">
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="col-md-2">
                     <label>email</label>
                  </div>
                  <div class="col-md-7">
                     <input type="text" name="email">
                  </div>
               </div>
               <br>           
               <input type="submit" name="submit" value="PUBLISH">             
            </form>
         </div>
         <?php
           include ('adminconn.php');
           if(isset($_POST['submit']))
             {
               $title=$_POST['title'];
               $comment=$_POST['comment'];
               $email=$_POST['email'];
               $weblink=$_POST['weblink'];
               $image=$_FILES['image']['tmp_name'];
               
               $binary=fread(fopen($image,"r"),filesize($image));
               $picture=base64_encode($binary);
               
               $insert="INSERT INTO publish(title,comment,weblink,email,image)VALUES('$title','$comment','$weblink','$email','$picture'))";

               $query=mysqli_query($conn,$insert);
               if(!$query)
               {  
                  echo $conn->error;
               }
            
               echo "<script>";
               echo "document.location.replace('./home.php')";
               echo "</script>";
            
          }
         ?>
   </body>
</html>