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
else{
  include 'reg_user_navbar.php';
}
   
   if(isset($_POST['but_upload'])){
    $tit=$_POST['title'];
    $desc=$_POST['description'];
    $acc_id=$_SESSION['id'];
    $weblink=$_POST['link'];
    $query = "INSERT INTO content(name,location,author_id,media_type,title,description) VALUES('website','".$weblink."',$acc_id,'article','".$tit."','".$desc."')";
    mysqli_query($conn,$query);
    echo "Upload successfully.";
   }
                   
   ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="website_upload.css">
  </head>
  <body>
    <div class="container">
      <form id="contact" action="" method="post">
        <h3>Upload Websites</h3>
        <h4>Publish websites and get your site popular</h4>
        <fieldset>
          <input name="title" placeholder="Website title" type="text" tabindex="1" required autofocus>
        </fieldset>
        <fieldset>
          <input name="link" placeholder="Website link" type="url" tabindex="4" required>
        </fieldset>
        <fieldset>
          <textarea name="description" placeholder="Website Description" tabindex="5" required></textarea>
        </fieldset>
        <fieldset>
          <button name="but_upload" type="submit" id="contact-submit" data-submit="...Sending">Publish</button>
        </fieldset>
      </form>


    </div>
  </body>
</html>
