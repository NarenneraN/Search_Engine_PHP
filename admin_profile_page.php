<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="admin_profile_page_style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php include 'admin_navbar.php';?>
  <div class="card-container">
  	<span class="pro">Admin</span>

<br><br>
<?php
         include 'ConnectDatabase.php';
         // session_start();
         $acc_id=$_SESSION['id'];
         $query = "SELECT admin_total_uploads FROM admin WHERE account_id=$acc_id";
         $query_run = mysqli_query($conn, $query);
         if(mysqli_num_rows($query_run) > 0)
         {
             foreach($query_run as $items)
             {
                $uploads=$items['admin_total_uploads'];
             }
         }
           if($_SESSION['lname'])
           {
            $fname = $_SESSION['fname'];
            $lname = $_SESSION['lname'];
            $email = $_SESSION['email'];
             echo "<div class='prof_in'>";
             echo "<span> NAME         :  <span>";
             echo "<span> $fname <span>";
             echo "<span> $lname <span>";
             echo "<br>";
             echo "<br>";
             echo "<span> EMAIL        :  <span>";
             echo "<span class='job'>$email</span>";
             echo "<br>";
             echo "<br>";
             echo "<span> UPLOADS DONE : <span>";
             echo "<span class='job'>$uploads</span>";
             echo "</div>";
           }

           ?>
    <br><br>

  </div>

</body>
</html>
