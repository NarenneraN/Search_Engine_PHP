<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="admin_renewal_track.css">
  <style>
      fieldset {
      background-color: #eeeeee;
      border-radius: 10px;
      padding-left: 20px;
      padding-right: 30px;
      padding-bottom: 5px;
      display: inline-block;
    }

    legend {
      background-color: gray;
      color: white;
      padding: 5px 10px;
    }

    .align-center {
    display: block;
    margin: 1.0em ;
    text-align: left;
    }

    .button{
        border-radius: 8px;
    }
  </style>

</head>

<body>
  <?php include 'admin_navbar.php';?>
  <h1>Payment HISTORY</h1>
  <form action="" method="GET">
     <div class="input-group mb-3">
         <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
         <button type="submit" class="btn btn-primary">Search</button>
     </div>
 </form>
 <form action="" method="POST" class="align-center">
    <fieldset>
        <legend style="text-align:center">Stats</legend>
        <input type="radio" id="html" name="stats" value="HTML">
        <label for="html">HTML</label><br>
        <input type="radio" id="css" name="stats" value="CSS">
        <label for="css">CSS</label><br>
        <input type="radio" id="javascript" name="stats" value="JavaScript">
        <label for="javascript">JavaScript</label>
        <br>
        <input type="submit" value="Submit" class="button">
    </fieldset>
 </form>
  <table>
    <thead>
      <tr>
        <th>Transaction Number</th>
        <th>Transaction Date</th>
        <th>Amount</th>
        <th>Purpose</th>
        <th>Account ID</th>
      </tr>
    </thead>
    <tbody>
      <?php

include 'ConnectDatabase.php';
    if(isset($_GET['search']))
    {
        $filtervalues = $_GET['search'];

        if ($filtervalues == 0) {
            $query = "SELECT transaction_no, date, amount, purpose, account_id FROM payments;";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $items)
                {
                    ?>
                    <tr>
                        <td><?= $items['transaction_no']; ?></td>
                        <td><?= $items['date']; ?></td>
                        <td><?= $items['amount']; ?></td>
                        <td><?= $items['purpose']; ?></td>
                        <td><?= $items['account_id']; ?></td>
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
        }
        else{
            $query = "SELECT transaction_no, date, amount, purpose, account_id FROM payments WHERE account_id LIKE '%$filtervalues%'";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $items)
                {
                    ?>
                    <tr>
                        <td><?= $items['transaction_no']; ?></td>
                        <td><?= $items['date']; ?></td>
                        <td><?= $items['amount']; ?></td>
                        <td><?= $items['purpose']; ?></td>
                        <td><?= $items['account_id']; ?></td>
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
        }
        
    }
    else{
        $query = "SELECT transaction_no, date, amount, purpose, account_id FROM payments;";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $items)
            {
                ?>
                <tr>
                    <td><?= $items['transaction_no']; ?></td>
                    <td><?= $items['date']; ?></td>
                    <td><?= $items['amount']; ?></td>
                    <td><?= $items['purpose']; ?></td>
                    <td><?= $items['account_id']; ?></td>
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
    }
?>
    </tbody>
  </table>
</body>
</html>
