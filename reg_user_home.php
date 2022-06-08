<?php 

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="reg_user_home_style.php">
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
       <?php include 'reg_user_navbar.php';?>
      <div class="Full_Page">
        <div class="page">
          <div class="search_logo">
               <img src="Amt02.png" alt="">
          </div>
          <div class="box">
         <input type="checkbox" id="check">
         <div class="search-box">
          <input type="text" placeholder="Type here...">
          <label for="check" class="icon">
            <i class="fas fa-search"></i>
          </label>
         </div>
         </div>
         <div class="block_cont">
           <div class="container">
          <h1>Apply Filter</h1>

          <div class="group">
            <input type="checkbox" id="xd" >
            <label for="xd">Keyword</label>
          </div>
          <div class="group">
            <input type="checkbox" id="figma">
            <label for="figma">Author</label>
          </div>

          <div class="group">
            <input type="checkbox" id="sketch" >
            <label for="sketch">URL</label>
          </div>
         </div>
         </div>
        </div>
      </div>


   </body>
</html>
