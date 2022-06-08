
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="reg_renewal.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <?php include 'reg_user_navbar.php';
  function makehimreg($scheme_id)
  {
    include 'ConnectDatabase.php';
    $acc_id=$_SESSION['id'];
    $thiss=date("Y-m-d h-i-s");
    $sql_reg = "UPDATE `reg_user` SET scheme_id=$scheme_id , reg_signup_date=CURRENT_TIMESTAMP where account_id=$acc_id";
    $query_reg = mysqli_query($conn,$sql_reg);
    if($query_reg)
    {
      echo "<script>alert('Renewed Successfully!')</script>";
      $sql_ins = "insert into renewal_details (account_id,scheme_id) VALUES ($acc_id,$scheme_id)";
      $query_ins = mysqli_query($conn,$sql_ins);
      echo "<script>window.location.href = 'reg_user_home.php'</script>";
    }
    else {
      echo mysqli_error($conn);
    }
  }
  if(isset($_POST['Basic']))
  {
    $scheme_id=1;
    makehimreg($scheme_id);
  }
  else if(isset($_POST['Standard'])){
   $scheme_id=2;
   makehimreg($scheme_id);
  }
  else if(isset($_POST['Premium'])){
    $scheme_id=3;
   makehimreg($scheme_id);
  }
  ?>
  <div class="wrapper">
    <input type="radio" name="slider" id="tab-1">
    <input type="radio" name="slider" id="tab-2" checked>
    <input type="radio" name="slider" id="tab-3">
    <header>
      <label for="tab-1" class="tab-1">Basic</label>
      <label for="tab-2" class="tab-2">Standard</label>
      <label for="tab-3" class="tab-3">Premium</label>
      <div class="slider"></div>
    </header>
    <div class="card-area">
      <div class="cards">
        <div class="row row-1">
          <div class="price-details">
            <span class="price">100</span>
            <p>For Normal Use</p>
          </div>
          <ul class="features">
            <li><i class="fas fa-check"></i><span>5 uploads per day</span></li>
            <li><i class="fas fa-check"></i><span>Can upload text , images , videos , audio</span></li>
            <li><i class="fas fa-check"></i><span>Maximum 8mbps upload speed</span></li>
<form class="" action="" method="post">
<input type="submit" name="Basic" value="GET STARTED">
</form>
<!-- <button>GET STARTED</button> -->
          </ul>
        </div>
        <div class="row">
          <div class="price-details">
            <span class="price">150</span>
            <p>For Small Offices</p>
          </div>
          <ul class="features">
            <li><i class="fas fa-check"></i><span>100 uploads per day</span></li>
            <li><i class="fas fa-check"></i><span>Can upload text , images , videos , audio</span></li>
            <li><i class="fas fa-check"></i><span>Maximum 100mbps upload speed</span></li>
            <form class="" action="" method="post">
            <input type="submit" name="Standard" value="GET STARTED">
            </form>
          </ul>
        </div>
        <div class="row">
          <div class="price-details">
            <span class="price">200</span>
            <p>For Organization purposes</p>
          </div>
          <ul class="features">
            <li><i class="fas fa-check"></i><span>Unlimited uploads per day</span></li>
            <li><i class="fas fa-check"></i><span>Can upload text , images , videos , audio</span></li>
            <li><i class="fas fa-check"></i><span>Unlimited upload speed</span></li>
            <form class="" action="" method="post">
            <input type="submit" name="Premium" value="GET STARTED">
            </form>
        </ul>
        </div>
      </div>
    </div>

  </div>

</body>
</html>
