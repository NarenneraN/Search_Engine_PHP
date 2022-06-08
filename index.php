<?php
session_start();
include 'ConnectDatabase.php';
// $conn = mysqli_connect('localhost','root','','test1') or die("Connection interupted!");
if(isset($_POST['loginacc']))
{
  if( isset($_POST['email_log']) && isset($_POST['password_log']) )
  {
    $sql = "select * from account_details";
    $email_log = $_POST['email_log'];
    $password_log = $_POST['password_log'];
    $password_log=md5($password_log);
    $result=mysqli_query($conn,$sql);
    $email_check=1;
    $pass_check=1;
    while($row = mysqli_fetch_assoc($result))
    {
      // echo "EMP ID :{$row['name']}  <br> ".
      //        "EMP NAME : {$row['email']} <br> ".
      //        "EMP SALARY : {$row['password']} <br> ".
      //        "--------------------------------<br>";
             if($row['email']==$email_log && $email_check==1)
             {
               $email_check=0;
               if($row['password']==$password_log && $email_check==0)
               {
                 $_SESSION['id']=$row['account_id'];
                 $_SESSION['fname']=$row['fname'];
                 $_SESSION['lname']=$row['lname'];
                 $_SESSION['email']=$row['email'];
                 if($row['account_type']=="user")
                 {
                   echo "<script>window.location.href = 'search.php'</script>";
                 }
                 else if($row['account_type']=="reguser")
                 {
                    echo "<script>window.location.href = 'Home_page.php'</script>";
                 }
                 else if($row['account_type']=="admin")
                 {
                    echo "<script>window.location.href = 'Home_page.php'</script>";
                 }

                $pass_check=0;
               }
             }

    }
    if($email_check==1|| $pass_check==1)
    {
    echo "<script>alert('Wrong Credentials!')</script>";
    }
  }
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="login-form.php">
      <script src="https://kit.fontawesome.com/afc6005920.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <a href=""><i class="fas fa-arrow-circle-left" id="back"></i></a>
    <div class="container">
      <div class="message">
        <h1 class="header_seo">AMRITA SEARCH ENGINE</h1>
        <div class="smaller">
          <h1>Let's Get Started</h1>
          <br>
          <p>Login to your account to get back into your data!  </p>
          <p>SIMPLE AND BETTER RESULTS!</p>
        </div>
      </div>
      <div class="login">
        <form id="create_form" action="" method="post">

            <input  type="email" autocomplete="off" placeholder="Email" required name="email_log">
            <input type="password"  autocomplete="off" placeholder="Password"  required name="password_log">
          <input type="submit" name="loginacc">Login</input>
        </form>

        <p>Didn't Signup Yet ? <a href="create_account.php">Sign Up</a></p>
      </div>
    </div>
    <!-- <script src="login_form.js"></script> -->
  </body>
</html>
