<?php
    include 'ConnectDatabase.php';
    include 'admin_navbar.php';
    $acc_id=$_SESSION['id'];

    if(isset($_GET['action'])){
        if ($_GET['action'] == "approve") {
            echo "line 77777777777777777777779------";
            $cid = $_GET['id'];
            echo $cid;
            $sql = "UPDATE content SET status='approved' WHERE id=$cid";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo '<script>alert("Approved Successfully!")</script>';
            }
            else{
                echo '<script>alert("Connection failed. Approval Failed!".mysqli_error($conn))</script>';
            }
        }

        if ($_GET['action'] == "decline") {

            //program

            $cid = $_GET['id'];
            $sql = "UPDATE content SET status='failed',comments='None' WHERE id=$cid";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo '<script>alert("Updated Succesfully!")</script>';
            }
            else{
               echo("Connection failed. Approval Failed!".mysqli_error($conn));

            }
        }
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="search.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            *
            {
                box-sizing:border-box;
            }
            .approvebutton {
              font: bold 20px Arial;
              text-decoration: none;
              background-color: #00FF00;
              color: #181818;
              padding: 4px 16px;
              outline:none;
            }

            .declinebutton {
                font: bold 20px Arial;
              text-decoration: none;
              background-color: #f7444e;
              color: #181818;
              padding: 4px 16px;
              outline:none;
            }
        </style>
    </head>

    <body class="background">
        <h1 class="py-3">Pending Approval</h1>

        <section>
            <div style="height: 30px;" class="main_tabs">
                <ul class="tabs">
                    <li class="is_active">
                        <img src="asserts/pics/image.png" class="image">
                        <a href="#image-content">Images</a>
                    </li>
                    <li>
                        <img src="https://img.icons8.com/color/48/000000/sony-vegas.png" class="image"/>
                        <a href="#video-content">Videos</a>
                    </li>
                    <li>
                        <img src="https://img.icons8.com/color/48/000000/music--v1.png" class="image"/>
                        <a href="#audio-content">Audio</a>
                    </li>
                    <li>
                        <img src="https://img.icons8.com/color/48/000000/geography--v1.png" class="image"/>
                        <a href="#website-content">Websites</a>
                    </li>
                </ul>
            </div>
            <hr color="#3C4044">
<!--  image contents-->
            <div  class="main_tab_content is_active" id="image-content">
              <?php

              // Images
              $fetchimages = mysqli_query($conn, "SELECT location,name,id,description,title FROM content WHERE media_type='image' and status='pending'");

              if(mysqli_num_rows($fetchimages) > 0)
              {
                  foreach($fetchimages as $items)
                  {
                      ?>
                       <div class="videoList">
              <h3 class="videoHeading" >
                  <?= $items['title']; ?>
              </h3>
              <div class="videoText">
                  <image src="<?= $items['location']; ?>" class="videoSize"></image>
                  <div>
                  <span>
                      <?= $items['description']; ?>
                  </span>
                  <br>
                  <br>
                  <span>
                <a href="admin_approve.php?action=approve&id=<?= $items['id']; ?>" class="approvebutton">Go</a>
                <a href="admin_approve.php?action=decline&id=<?= $items['id']; ?>" class="declinebutton">Don't</a>
                </span>
                  </div>


              </div>

              </div>

                      <?php
                  }
              }
              else
              {
                  ?>
                      <div class="">
                           <h1 style="color:#f7444e">OOPS!  No New Images for Approval</h1>
                      </div>
                  <?php
              }
              // Videos

              ?>
            </div>

<!--  Video Contents-->
<div class="main_tab_content" id="video-content">

      <?php

      // Video
        $fetchvideos = mysqli_query($conn, "SELECT distinct location,name,title,description,id  FROM content WHERE media_type='video' and status='pending'");

      if(mysqli_num_rows($fetchvideos) > 0)
      {
          foreach($fetchvideos as $items)
          {
              ?>
               <div class="videoList">
              <h3 class="videoHeading" >
                  <?= $items['title']; ?>
              </h3>
              <div class="videoText">
                  <video src="<?= $items['location']; ?>" class="videoSize" controls></video>
                  <div>
                  <span>
                      <?= $items['description']; ?>
                  </span>
                  <br>
                  <br>
                  <span>
                <a href="admin_approve.php?action=approve&id=<?= $items['id']; ?>" class="approvebutton">Go</a>
                <a href="admin_approve.php?action=decline&id=<?= $items['id']; ?>" class="declinebutton">Don't</a>
                </span>
                  </div>


              </div>

              </div>
              <?php
          }
      }
      else
      {
          ?>
              <div class="">
                   <h1 style="color:#f7444e">OOPS! No New Videos for Approval</h1>
              </div>
          <?php
      }
      // Videos

      ?>


</div>

<!-- Article Contents -->
<div class="main_tab_content" id="audio-content">

      <?php

      // Audio
        $fetchaudios = mysqli_query($conn, "SELECT distinct location,name,title,description,id  FROM content WHERE media_type='audio' and status='pending'");

      if(mysqli_num_rows($fetchaudios) > 0)
      {
          foreach($fetchaudios as $items)
          {
              ?>
               <div class="videoList">
              <h3 class="videoHeading" >
                  <?= $items['title']; ?>
              </h3>
              <div class="videoText">
                  <audio src="<?= $items['location']; ?>" class="videoSize" controls></audio>
                  <div>
                  <span>
                      <?= $items['description']; ?>
                  </span>
                  <br>
                  <br>
                  <span>
                <a href="admin_approve.php?action=approve&id=<?= $items['id']; ?>" class="approvebutton">Go</a>
                <a href="admin_approve.php?action=decline&id=<?= $items['id']; ?>" class="declinebutton">Don't</a>
                </span>
                  </div>


              </div>

              </div>
              <?php
          }
      }
      else
      {
          ?>
              <div class="">
                   <h1 style="color:#f7444e">OOPS!  No Audios Found</h1>
              </div>
          <?php
      }
      // Videos

      ?>


</div>

<!-- Website Contents -->
            <div class="main_tab_content" id="website-content">

                <?php

                    // web
                    $fetchweb = mysqli_query($conn, "SELECT distinct location,name,title,description,id  FROM content WHERE media_type='article' and status='pending'");

                    if(mysqli_num_rows($fetchweb) > 0)
                    {
                        foreach($fetchweb as $items)
                        {
                            ?>
                                <div class="website">
                                <p>

                                        <span>

                                        <?= $items['location']; ?>

                                        </span>
                                        <h3 class="websiteHeading">
                                        <a href="<?= $items['location']; ?>" target="_blank"><?= $items['title']; ?></a>

                                        </h3>
                                    </a>
                                    <span class="websiteText">
                                    <?= $items['description']; ?>
                                    </span>
                                </p>
                            </div>
                            <span>
                <a href="admin_approve.php?action=approve&id=<?= $items['id']; ?>" class="approvebutton">Go</a>
                <a href="admin_approve.php?action=decline&id=<?= $items['id']; ?>" class="declinebutton">Don't</a>
            </span>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                            <div class="">
                                <h1 style="color:#f7444e">OOPS!  No websites Found</h1>
                            </div>
                        <?php
                    }
                    // Videos

                    ?>
                    <!-- <div class="website">
                    <p>
                        <a href="https://www.nyan.cat"></a>
                            <span>

                                    https://www.nyan.cat

                            </span>
                            <h3 class="websiteHeading">
                                NYAN.CAT!
                            </h3>
                        </a>
                        <span class="websiteText">
                            The wave crashed and hit the sandcastle head-on. The sandcastle began to melt under the waves force and as the wave receded, half the sandcastle was gone.
                        </span>
                    </p>
                </div> -->
    </div>
        </section>
        <script src="search.js"></script>
    </body>
</html>
