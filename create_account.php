<?php
include 'ConnectDatabase.php';
$fname = '';
$lname = '';
$email = '';
$password = '';
  if(isset($_POST['createacc']))
  {
    if(isset($_POST['fname'])&&isset($_POST['fname'])&&isset($_POST['email'])&&isset($_POST['password']))
    {
      // $check=0;
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $password=md5($password);
//Getting all emails
        $sql_em = "select email from account_details where email='".$email."'";
        $que_em=mysqli_query($conn,$sql_em);
        $sql_email = mysqli_num_rows($que_em);
        $check1=0;

        if($sql_email>0)
        {
          $check1=1;
          echo "<script>alert('Email Already Exists!')</script>";
        }
        if($check1==0)
        {
          //Insertion
          $sql = "INSERT INTO `account_details` (`fname`,`lname`,`email`,`password`,`account_type`) values ('$fname','$lname','$email','$password','user')";
          $query = mysqli_query($conn,$sql);
          if($query)
          {
            echo "<script>alert('User Registerd successfully! You can login with your account')</script>";
            $fname = '';
            $lname = '';
            $email = '';
            $password = '';
            echo "<script>window.location.href = 'index.php'</script>";
          }
          else {
            echo ("Hah! Shit here we go again!". mysqli_error($conn));
          }
        }

      }
  }


 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="create_account_style.php">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="fname" placeholder="Enter your first name" required value="<?php echo $fname; ?>">
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="lname" placeholder="Enter your last name" required value="<?php echo $lname; ?>">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email" required value="<?php echo $email; ?>">
          </div>

          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required value="<?php echo $password; ?>">
          </div>

        </div>

        <div class="button">
          <input type="submit" name="createacc" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
