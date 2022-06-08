<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="admin_renewal_track.css">

</head>

<body>
  <?php include 'admin_navbar.php';?>
  <h1>RENEWAL HISTORY</h1>
  <form action="" method="GET">
     <div class="input-group mb-3">
         <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
         <button type="submit" class="btn btn-primary">Search</button>
     </div>
 </form>
  <table>
    <thead>
      <tr>
        <th>Renewal Id</th>
        <th>Account Id</th>
        <th>Name</th>
        <th>Scheme Id</th>
        <th>Scheme Renewed</th>
        <th>Date Renewed</th>
        <th>Cost</th>
      </tr>
    </thead>
    <tbody>
      <?php

include 'ConnectDatabase.php';
    if(isset($_GET['search']))
    {
        $filtervalues = $_GET['search'];
        $query = "SELECT * FROM ((renewal_details natural join account_details)natural join scheme)natural join scheme_details WHERE CONCAT(fname,lname,email,account_id) LIKE '%$filtervalues%'";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $items)
            {
                ?>
                <tr>
                    <td><?= $items['renewal_scheme_id']; ?></td>
                    <td><?= $items['account_id']; ?></td>
                    <td><?= $items['fname']; ?></td>
                    <td><?= $items['scheme_id']; ?></td>
                    <td><?= $items['scheme_type']; ?></td>
                    <td><?= $items['renewal_scheme_date']; ?></td>
                    <td><?= $items['scheme_price_rupees']; ?></td>
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
        $query = "SELECT * FROM ((renewal_details natural join account_details)natural join scheme)natural join scheme_details";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $items)
            {
                ?>
                <tr>
                    <td><?= $items['renewal_scheme_id']; ?></td>
                    <td><?= $items['account_id']; ?></td>
                    <td><?= $items['fname']; ?></td>
                    <td><?= $items['scheme_id']; ?></td>
                    <td><?= $items['scheme_type']; ?></td>
                    <td><?= $items['renewal_scheme_date']; ?></td>
                    <td><?= $items['scheme_price_rupees']; ?></td>
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
