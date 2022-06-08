<?php
session_start();
function makehimereg_in_acc()
{
include 'ConnectDatabase.php';
  $acc_id=$_SESSION['id'];
  $scheme_id_1=$_SESSION['scheme'];
  $amount1=$_SESSION['amount'];
  $sql_upd = "UPDATE account_details SET account_type='reguser' WHERE account_id=$acc_id";
$query_upd = mysqli_query($conn,$sql_upd);
$cardnumber = rand(1234567890123456,9999999999999999);
$cardnumber=md5($cardnumber);
$sql_pay_add = "INSERT INTO `payments` (`amount`,`purpose`,`account_id`,`card_no`) values ($amount1,'Registration',$acc_id,'".$cardnumber."')";
$query_updt = mysqli_query($conn,$sql_pay_add);
if($query_upd&&$query_updt)
{
  echo "<script>alert('User Registerd successfully! You can login with your account')</script>";
  echo "<script>window.location.href = 'reg_user_home.php'</script>";
}
else {
  echo "Hah! Shit here we go again!";
  echo $conn->error;
}
}
function makehimreg()
{
  include 'ConnectDatabase.php';
  $acc_id=$_SESSION['id'];
  $scheme_id_1=$_SESSION['scheme'];
  $sql_reg = "INSERT INTO `reg_user` (`account_id`,`reg_user_total_uploads`,`scheme_id`) values ($acc_id,0,$scheme_id_1)";
  $query_reg = mysqli_query($conn,$sql_reg);
  if($query_reg)
  {
    echo "<script>alert('Payment successfully made!')</script>";
    makehimereg_in_acc();
  }
  else {
    // echo "<script>alert('Error!You might have already registered')</script>";
    echo mysqli_error($conn);
  }
}
  if(isset($_POST['Basic'])){
    $sch = "Basic";
    $amt = 100;
      $_SESSION['amount']=100;
  $_SESSION['scheme']=1;
  }
  else if(isset($_POST['Standard'])){
    $sch = "Standard";
    $amt = 150;
    $_SESSION['amount']=150;
    $_SESSION['scheme']=2;
  }
  else if(isset($_POST['Premium'])){
    $sch = "Premium";
    $amt = 200;
    $_SESSION['amount']=200;
    $_SESSION['scheme']=3;
  }

  if (isset($_POST['pay'])) {
    makehimreg();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="pricing_style.php">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
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
<form class="" action="#modal" method="post">
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
            <form class="" action="#modal" method="post">
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
            <form class="" action="#modal" method="post">
            <input type="submit" name="Premium" value="GET STARTED">
            </form>
        </ul>
        </div>
      </div>
    </div>

  </div>

   <div class="modal" id="modal">
      <div class="modal__content">
        <a href="#" class="modal__close">&times;</a>
        <h2 class="modal__heading">Payment Section</h2>
          <div class="payment_container">
            <p class="payment_header">Payment Deatils</p>
            <div class="payment_inputs">
              <div class="top_inp_pay">
                <div class="division_input">
                  <label>CardHolder's Name</label>
                  <input type="text"  pattern="[a-zA-Z]{1,}" required  oninvalid="this.setCustomValidity('Please Enter Valid Name')" oninput="this.setCustomValidity('')">
                </div>
                <div class="division_input">
                  <label>Card Number</label>
                  <input type="text"  name="cardno" pattern="[0-9]{16}"  required  oninvalid="this.setCustomValidity('Enter Valid 16 Digits Card Number')" oninput="this.setCustomValidity('')">
                </div>

              </div>
              <div class="down_inp_pay">
                <div class="division_input">
                  <label for="month">Expiry Month</label>
                  <select id="month" name="month">
                    <option value="Janauary">Janauary</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                  </select>
                </div>
                <div class="division_input">
                  <label for="year">Expiry Year</label>
                  <select id="year" name="year">
                    <option value=2021>2021</option>
                    <option value=2022>2022</option>
                    <option value=2023>2023</option>
                    <option value=2024>2024</option>
                    <option value=2025>2025</option>
                    <option value=2026>2026</option>
                    <option value=2027>2027</option>
                    <option value=2028>2028</option>
                  </select>
                </div>
                <div class="division_input">
                  <label>CVV</label>
                  <input type="password"  pattern="[0-9]{3}"  required  oninvalid="this.setCustomValidity('Enter Valid 3 Digit CVV')" oninput="this.setCustomValidity('')">
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="order_summary">
            <p class="order_header">Order Summary</p>
            <div class="order_product_add" style="text-align:right">
              <?php
                echo  $sch;
                echo "<br>";
                echo  "₹".$amt;
              ?>
            </div>
            <hr>
            <div class="total_payment_container">
                <p>Total</p>
                <p style="font-family: 'Josefin Sans', sans-serif;" class="payment_total_price">
              <?php
                echo  "₹".$amt;
              ?>
                </p>
            </div>
            <form class="" action="pricing.php" method="post">
            <div class="order_payment_button_div">
               <button type="submit" name="pay" id="order_payment_button">PAY</button>
            </div>
            </form>
          </div>

      </div>
   </div>
</body>
</html>
