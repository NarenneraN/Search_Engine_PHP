<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="admin_renewal_track.css">

</head>

<body>
  <?php include 'admin_navbar.php';?>
  <h1>Search HISTORY</h1>
  <form action="" method="GET">
     <div class="input-group mb-3 holder">
         <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
         <button type="submit" class="btn btn-primary">Search</button>
     </div>
 </form>
  <table>
    <thead>
      <tr>
        <th>Search Id</th>
        <th>Account Id</th>
        <th>Date Searched</th>
        <th>Keyword Entered</th>
      </tr>
    </thead>
    <tbody>
      <?php

include 'ConnectDatabase.php';
    if(isset($_GET['search']))
    {
        $filtervalues = $_GET['search'];

        if ($filtervalues == 0) {
            $query = "SELECT distinct * FROM search_history natural join account_details";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $items)
                {
                    ?>
                    <tr>
                        <td><?= $items['id']; ?></td>
                        <td><?= $items['account_id']; ?></td>
                        <td><?= $items['date_visited']; ?></td>
                        <td><?= $items['keyword_entered']; ?></td>
                    </tr>
                    <?php
                }
            }
            else
            {
                ?>
                    <tr>
                        <td colspan="4">OOPS ! No Record Found</td>
                    </tr>
                <?php
            }
        }
        else{
            $query = "SELECT distinct * FROM search_history natural join account_details WHERE CONCAT(account_id) LIKE '%$filtervalues%'";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $items)
                {
                    ?>
                    <tr>
                        <td><?= $items['id']; ?></td>
                        <td><?= $items['account_id']; ?></td>
                        <td><?= $items['date_visited']; ?></td>
                        <td><?= $items['keyword_entered']; ?></td>
                    </tr>
                    <?php
                }
            }
            else
            {
                ?>
                    <tr>
                        <td colspan="4">OOPS ! No Record Found</td>
                    </tr>
                <?php
            }
        }
        
    }

    else{
        $query = "SELECT distinct * FROM search_history natural join account_details";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $items)
            {
                ?>
                <tr>
                    <td><?= $items['id']; ?></td>
                    <td><?= $items['account_id']; ?></td>
                    <td><?= $items['date_visited']; ?></td>
                    <td><?= $items['keyword_entered']; ?></td>
                </tr>
                <?php
            }
        }
        else
        {
            ?>
                <tr>
                    <td colspan="4">OOPS ! No Record Found</td>
                </tr>
            <?php
        }

    }
?>
    </tbody>
  </table>
</body>
</html>
