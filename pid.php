<html>
   <head>
      <title>pid1</title>
   </head>
   <body>
         <form action="" method="POST">
         <div class="row">
             <div class="col-md-2">
                <label>Post id</label>
             </div>
             <div class="col-md-7">
                <input type='text' name='pid'>
             </div>
          </div>
          <input type="submit" name="submit" value="submit">
      </form>
      <?php
        require 'adminconn.php';
        if(isset($_POST['submit']))
        {
          $id=$_POST['pid'];
          $accept=mysqli_query($conn,"SELECT * FROM publish WHERE pid='$id'");
          $number=mysqli_num_rows($accept);
          if($number==1)
          {
            session_start();
            $row=mysqli_fetch_assoc($accept);
              $userid=$row['pid'];
              $_SESSION['pid']=$userid;
              echo $userid;

              echo "<script language='Javascript'>";
              echo "document.location.replace('./pid1.php')";
                echo "</script>";

          }
        }
      ?>
    </body>          
</html>