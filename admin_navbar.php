<?php
if (!isset($_SESSION))
{
  session_start();
}
// include 'ConnectDatabase.php';
    if($_SESSION['lname'])
    {
      // Storing for displaying in bottom of navbar details
     $fname = $_SESSION['fname'];
     $lname = $_SESSION['lname'];
     $email = $_SESSION['email'];
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin_navbar_style.php">
    <script src="https://kit.fontawesome.com/afc6005920.js" crossorigin="anonymous"></script> <!-- to get desired icons link to font awesome-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
      <i class="fas fa-graduation-cap icon"></i>
        <div class="logo_name">A M R I T A</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <!-- <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> -->
      <!-- Home -->
      <li>
        <a href="Home_page.php">
          <i class="fas fa-house-damage"></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <!-- Profile -->
      <li>
       <a href="admin_profile_page.php">
         <i class="fas fa-user-alt"></i>
         <span class="links_name">Profile</span>
       </a>
       <span class="tooltip">Profile</span>
     </li>
     <!-- Modify -->
     <li>
       <a href="admin_edit_profile.php">
         <i class="fas fa-edit"></i>
         <span class="links_name">Edit Profile</span>
       </a>
       <span class="tooltip">Edit Profile</span>
     </li>
     <!-- Upload  -->
     <li>
     <a href='upload_home.php'>
                  <i class='fas fa-images'></i>
                  <span class='links_name'>Upload Files</span>
                </a>
                <span class='tooltip'>Upload Files</span>
              </li>
              <!-- <li>
                <a href='video_upload.php'>
                  <i class='fas fa-file-video'></i>
                  <span class='links_name'>Upload Videos</span>
                </a>
                <span class='tooltip'>Upload Videos</span>
              </li>
              <li>
                <a href='audio_upload.php'>
                  <i class='fas fa-file-audio'></i>
                  <span class='links_name'>Upload Audios</span>
                </a>
                <span class='tooltip'>Upload Audios</span>
              </li>
              <li>
                <a href='website_upload.php'>
                 <i class='far fa-newspaper'></i>
                  <span class='links_name'>Upload Articles</span>
                </a>
                <span class='tooltip'>Upload Articles</span>
              </li> -->

     <!-- Modify -->
     <li>
       <a href="admin_edit_user.php">
         <i class="fas fa-edit"></i>
         <span class="links_name">Modify details</span>
       </a>
       <span class="tooltip">Modify details</span>
     </li>
     <!-- Approval -->
     <li>
        <a href="admin_approve.php">
          <i class="fas fa-house-damage"></i>
          <span class="links_name">Approval</span>
        </a>
         <span class="tooltip">Approval</span>
      </li>
      <!-- Report -->
      <li>
       <a href="scheme_wise_report.php">
       <i class="fas fa-chart-pie"></i>
         <span class="links_name">Report</span>
       </a>
       <span class="tooltip">Report</span>
     </li>
     <!-- Search history -->
     <li>
       <a href="track_history_home.php">
         <i class="fas fa-search-location"></i>
         <span class="links_name">Track history</span>
       </a>
       <span class="tooltip">Track History</span>
     </li>
     <!-- Uploads tracker -->
     <li>
      <a href="reguser_uploads.php">
      <i class="fas fa-chart-line"></i>
        <span class="links_name">Uploads Tracker</span>
      </a>
      <span class="tooltip">Uploads Tracker</span>
    </li>
     <li>
       <a href="logout.php" onclick="return confirm('Are you sure to logout')">
       <i class="fas fa-sign-out-alt"></i>
         <span class="links_name">Log out</span>
       </a>
       <span class="tooltip">Log out</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
           <?php

           if($_SESSION['lname'])
           {
            $name = $_SESSION['fname'];
             echo "<div class='name'> $name  </div>";
              echo "<div class='job'>ADMINISTRATOR</div>";
           }

           ?>

           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li>
    </ul>
  </div>

  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
</body>
</html>
