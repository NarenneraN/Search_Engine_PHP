<?php
session_start();
 ?>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>FullScreen Search Box | CodingNepal</title>
      <link rel="stylesheet" href="search_style.css">
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
     <div class="scheme">
        <a href="pricing.php">Register Scheme to upload -></a>
     </div>
     <?php

      ?>
     <div class="welcome">
       <div class="left_welc">
          <i class="fas fa-user-circle"></i>
       </div>
       <div class="right-welc">
          <div class="">
            <span><?php echo $_SESSION['fname'] ?> <?php echo $_SESSION['lname'] ?></span>
          </div>
          <div class="">
             <a href="logout.php">Logout</a>
          </div>
       </div>
     </div>
      <div class="Full_Page">
        <?php
include 'Home_page.php';
         ?>

      </div>


   </body>
</html>
