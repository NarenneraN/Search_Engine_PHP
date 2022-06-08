
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="reg_user_profile.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php include 'reg_user_navbar.php';?>
  <div class="card-container">
  	<span class="pro">Registered user</span>

<br><br>
<?php 
         include 'ConnectDatabase.php';
         // session_start();
         $reg_id = $_SESSION['id'];
         $sql_reg_scheme = "select scheme_id from reg_user where account_id=$reg_id";
         $query_get_scheme_id= mysqli_query($conn,$sql_reg_scheme);
         $getschemeid = mysqli_fetch_array($query_get_scheme_id);
         $schemeid = (int)$getschemeid[0];
         if($query_get_scheme_id)
         {
             $sql_scheme = "select scheme_type from scheme where scheme_id=$schemeid";
             $query_get_scheme= mysqli_query($conn,$sql_scheme);
             $schemetypeget=mysqli_fetch_array($query_get_scheme);
         }  
           if($_SESSION['lname'])
           {
            $fname = $_SESSION['fname'];
            $lname = $_SESSION['lname'];
            $email = $_SESSION['email'];
             echo "<span> $fname <span>";
             echo "<span> $lname <span>";
             echo "<br>";
             echo "<div class='job'>$email</div>";
             echo "<br>";
             echo "<span>Scheme :- <span>";
             echo "<span> $schemetypeget[0] <span>";
           } 
           
           ?>
    <br><br>
  
  </div>

</body>
</html>
