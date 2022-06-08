<?php
include 'ConnectDatabase.php';
include 'admin_navbar.php';
if (!isset($_SESSION))
  {
    session_start();
  }
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$email_ref=$_SESSION['email'];
  if(isset($_POST['editacc']))
  {
    if(isset($_POST['fname'])&&isset($_POST['fname'])&&isset($_POST['email']))
    {
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];

        $sql_em = "select email from account_details where email='".$email."'";
        $que_em=mysqli_query($conn,$sql_em);
        $sql_email_value=mysqli_fetch_array($que_em);
        $sql_email = mysqli_num_rows($que_em);
        $check1=0;

        if($sql_email>0&&$email_ref!=$email)
        {
          $check1=1;
          echo "<script>alert('Failed! Email inappropriate , Account already exists in that id!')</script>";
          $fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
        }
        if($check1==0)
        {
          //Insertion
          $sql = "UPDATE `account_details` SET fname='$fname',lname='$lname',email='$email' where email='$email_ref'";
          $query = mysqli_query($conn,$sql);
          $_SESSION['fname']=$fname;
          $_SESSION['lname']=$lname;
          $_SESSION['email']=$email;
          $fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$email_ref=$_SESSION['email'];
          if($query)
          {
           
            echo "<script>alert('Details Edited Successfully!')</script>";
            // $fname = '';
            // $lname = '';
            // $email = '';
            // echo "<script>window.location.href = 'index.php'</script>";
          }
          else {
            echo("Error description: " . mysqli_error($conn));
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

        </div>

        <div class="button">
          <input type="submit" name="editacc" value="Edit">
        </div>
      </form>
    </div>
  </div>

</body>
</html>