<?php
include 'ConnectDatabase.php';
if (!isset($_SESSION))
{
  session_start();
}
$acc_id=$_SESSION['id'];
$sql_choose = "select * from account_details where account_id=$acc_id";
$result_choose=mysqli_query($conn,$sql_choose);
$row_choose = mysqli_fetch_assoc($result_choose);
$acc_type1=$row_choose['account_type'];
if(strcasecmp($acc_type1,"admin")==0)
{
  include 'admin_navbar.php';
}
else if(strcasecmp($acc_type1,"reguser")==0){
  include 'reg_user_navbar.php';
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="admin_home_page_CSS.css">
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>

      <div class="Full_Page">
        <div class="page">
          <div class="search_logo">
               <img src="Amt02.png" alt="">
          </div>
          <div class="wrapper">
  <div class="label">Submit your search</div>
  <form action="search_res.php" method="post">
  <div class="searchBar">
      <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Search" value="" />
      <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
        </svg>
      </button>
  </div>
  <div class="radio_all">
    <label>
      <input value="keyword" type="radio" name="filtered" checked/>
      <span>BY KEYWORDS</span>
    </label>
    <label>
      <input value="author" type="radio" name="filtered"/>
      <span>BY AUTHOR</span>
    </label>
  </div>
  </form>

</div>
         <!-- Radio -->




         <!-- End Radio -->
        </div>
      </div>


   </body>
</html>
