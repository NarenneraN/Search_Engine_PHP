<?php
include 'ConnectDatabase.php';
include 'admin_navbar.php';
if (!isset($_SESSION))
  {
    session_start();
  }

if(isset($_GET['search'])){
        $id=$_GET['search'];
        $query0 = "SELECT account_id, email, fname, lname,account_type FROM account_details where account_id = $id and account_type in ('user', 'reguser');";
        $query_run0 = mysqli_query($conn, $query0);

        if(mysqli_num_rows($query_run0) > 0)
        {
            foreach($query_run0 as $items0)
            {
                $fname = $items0['fname'];
                $lname = $items0['lname'];
                $email = $items0['email'];
                $acc_type = $items0['account_type'];

                $fname_ref = $items0['fname'];
                $lname_ref = $items0['lname'];
                $email_ref = $items0['email'];
            }
        }
        else{
          echo "<script>alert('No USER found with the ID')</script>";
          echo "<script>window.location.href = 'admin_edit_user.php'</script>";
        }
}

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
          $fname = $fname_ref;
          $lname = $lname_ref;
          $email = $email_ref;
        }
        if($check1==0)
        {
          //Insertion
          $sql = "UPDATE `account_details` SET fname='$fname',lname='$lname',email='$email' where account_id = $id";
          $query = mysqli_query($conn,$sql);
          $_POST['fname']=$fname;
          $_POST['lname']=$lname;
          $_POST['email']=$email;
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $email = $_POST['email'];
          $email_ref=$_POST['email'];
          if($query)
          {
           
            echo "<script>alert('Details Edited Successfully!')</script>";
            // $fname = '';
            // $lname = '';
            // $email = '';
            echo "<script>window.location.href = 'admin_edit_user.php'</script>";
          }
          else {
            echo("Error description: " . mysqli_error($conn));
            echo "<script>window.location.href = 'admin_edit_user.php'</script>";
          }
        }

      }
      
  }

if(isset($_POST['delete'])){
    if($acc_type == 'user'){
        $sql = "DELETE FROM account_details WHERE account_id = $id";

        if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Record deleted successfully!')</script>";
          echo "<script>window.location.href = 'admin_edit_user.php'</script>";
        } else {
          echo "Error deleting record: " . mysqli_error($conn);
        }
    }
          
    if($acc_type == 'reguser'){
        $sql = "DELETE FROM reg_user WHERE account_id = $id";
        $sql1 = "DELETE FROM upload_rights WHERE account_id = $id";
        $sql2 = "DELETE FROM account_details WHERE account_id = $id";
        

        if (mysqli_multi_query($conn, $sql)) {
          if (mysqli_multi_query($conn, $sql1)) {
            if (mysqli_multi_query($conn, $sql2)) {
              echo "<script>alert('Record deleted successfully!')</script>";
              echo "<script>window.location.href = 'admin_edit_user.php'</script>";          
            } else {
              echo "Error deleting record: " . mysqli_error($conn);
            }          
          } else {
            echo "Error deleting record: " . mysqli_error($conn);
          }          
        } else {
          echo "Error deleting record: " . mysqli_error($conn);
        }
    }   
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="admin_renewal_track.css">
  <link rel="stylesheet" href="admin_edit_user_style.php">
  <style>
      /*Modal*/
    .modal{
       background-color: rgba(0,0,0, .8);
       width:100%;
       height: 100vh;
       position: absolute;
       top: 0;
       left: 0;
       z-index: 10;
       opacity: 0;
       visibility: hidden;
       transition: all .5s;
      }

      .modal__content{
       width: 50%;
       height: 90%;
       background-color: #fff;
       position: absolute;
       top: 50%;
       left: 50%;
       transform: translate(-50%, -50%);
       padding: 2em;
       border-radius: 1em;
       opacity: 0;
       visibility: hidden;
       transition: all .5s;
      }

      #modal:target{
       opacity: 1;
       visibility: visible;
      }

      #modal:target .modal__content{
       opacity: 1;
       visibility: visible;
      }

      .modal__close{
       color: #363636;
       font-size: 2em;
       position: absolute;
       top: .5em;
       right: 1em;
      }

      .modal__heading{
       color: dodgerblue;
       margin-bottom: 1em;
      }

      .modal__paragraph{
       line-height: 1.5em;
      }

    .modal-open{
     display: inline-block;
     color: dodgerblue;
     margin: 2em;
    }
  </style>

</head>

<body>
  <h1>Modify User Details</h1>
  <form action="#modal" method="GET">
     <div class="input-group mb-3">
         <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
         <button type="submit" class="btn btn-primary">Search</button>
     </div>
 </form>
  <table>
    <thead>
      <tr>
        <th>Account Id</th>
        <th>E-Mail</th>
        <th>F Name</th>
        <th>L Name</th>
        <th>Account Type</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = "SELECT account_id, email, fname, lname, account_type FROM account_details where account_type != 'admin';";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $items)
            {
                ?>
                <tr>
                    <td><?= $items['account_id']; ?></td>
                    <td><?= $items['email']; ?></td>
                    <td><?= $items['fname']; ?></td>
                    <td><?= $items['lname']; ?></td>
                    <td><?= $items['account_type']; ?></td>
                </tr>
                <?php
            }
        }
        else
        {
            ?>
                <tr>
                    <td colspan="4">No Record Found</td>
                </tr>
            <?php
        }
?>
    </tbody>
  </table>

    <div class="modal" id="modal">
      <div class="modal__content">
        <a href="#" class="modal__close">&times;</a>
        <h2 class="modal__heading">Edit or Delete Account</h2>
          <div class="container">
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
                <form class="" action="" method="post">
                    <div class="button">
                      <input type="submit" name="editacc" value="Edit">
                    </div>
                    <div class="button">
                        <input type="submit" name="delete" value="Delete Account">
                    </div>
                </form>
              </form>
            </div>
          </div>
      </div>
    </div>
</body>
</html>
