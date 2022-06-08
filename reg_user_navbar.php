<?php
if (!isset($_SESSION))
{
  session_start();
}
include 'ConnectDatabase.php';
              // Code to calc days
               $email = $_SESSION['email'];
               $reg_id = $_SESSION['id'];
               $sql_em = "select reg_signup_date  from reg_user natural join account_details where email='".$email."'";
               $que_em=mysqli_query($conn,$sql_em);
               $sql_email_value=mysqli_fetch_array($que_em);
               $created_date=$sql_email_value[0];
               $phpdate = strtotime( $created_date );
               $mysqldate = date( 'd-m-Y', $phpdate );
               $today = date('d-m-Y');

               $earlier = new DateTime($mysqldate);
                $later = new DateTime($today);

                $interval = date_diff($earlier, $later);
                $abs_diff = $later->diff($earlier)->format("%a");
                // Code to verify is he active
                $sql_ten="select scheme_tenure_years from (reg_user natural join scheme) natural join scheme_details where account_id=$reg_id";
                $que_ten = mysqli_query($conn,$sql_ten);
                $sql_ten_arr=mysqli_fetch_array($que_ten);
                $tenure_years=$sql_ten_arr[0];
                if($tenure_years*365>=$abs_diff)
                {
                  $whoishe='reg_user';
                }
                else{
                  $whoishe='user';
                }

if($whoishe=='reg_user')
{

  // Gettong scheme_id
  $sql_reg_scheme = "select scheme_id from reg_user where account_id=$reg_id";
  $query_get_scheme_id= mysqli_query($conn,$sql_reg_scheme);
  $getschemeid = mysqli_fetch_array($query_get_scheme_id);
  // variable with scheme_id
  $schemeid = (int)$getschemeid[0];
  if($query_get_scheme_id)
  {
    // getting scheme_type
      $sql_scheme = "select scheme_type from scheme where scheme_id=$schemeid";
      $query_get_scheme= mysqli_query($conn,$sql_scheme);
      $schemetypeget=mysqli_fetch_array($query_get_scheme);
  }
    if($_SESSION['lname'])
    {
      // Storing for displaying in bottom of navbar details
     $fname = $_SESSION['fname'];
     $lname = $_SESSION['lname'];
     $email = $_SESSION['email'];
    }
}

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="reg_user_navbar_style.php">
    <script src="https://kit.fontawesome.com/afc6005920.js" crossorigin="anonymous"></script> <!-- to get desired icons link to font awesome-->
    <!-- Boxicons CDN Link -->
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

      <li>
        <a href="Home_page.php">
          <i class="fas fa-house-damage"></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <?Php
      if($whoishe=='reg_user')
      {
        echo "      <li>";
        echo "       <a href='reg_user_profile.php'>";
        echo "         <i class='fas fa-user-alt'></i>";
        echo "         <span class='links_name'>Profile</span>";
        echo "       </a>";
        echo "       <span class='tooltip'>Profile</span>";
        echo "      </li>";
        echo "     <li>";
        echo "       <a href='reg_edit_profile.php'>";
        echo "         <i class='fas fa-edit'></i>";
        echo "         <span class='links_name'>Edit Profile</span>";
        echo "       </a>";
        echo "       <span class='tooltip'>Edit Profile</span>";
        echo "     </li>";
        echo "     <li>";
        echo "       <a href='upload_home.php'>";
        echo "         <i class='fas fa-images'></i>";
        echo "         <span class='links_name'>Upload Files</span>";
        echo "       </a>";
        echo "       <span class='tooltip'>Upload Files</span>";
        echo "     </li>";
      }
      ?>
      <li>
       <a href="reguser_uploads.php">
       <i class="fas fa-chart-line"></i>
         <span class="links_name">Uploads Tracker</span>
       </a>
       <span class="tooltip">Uploads Tracker</span>
     </li>
      <li>
       <a href="reg_renewal.php">
       <i class="fas fa-calendar-week"></i>
         <span class="links_name">Renew scheme</span>
       </a>
       <span class="tooltip">Renew Scheme</span>
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
             if($whoishe=='reg_user')
             {
              echo "<div class='job'>REGISTERED USER</div>";
             }
             else{
              echo "<div class='job'>UNREGISTERED USER</div>";
             }


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
