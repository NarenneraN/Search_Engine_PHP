<?php
    include 'ConnectDatabase.php';
    if (!isset($_SESSION))
   {
	 session_start();
   }
   $acc_id=$_SESSION['id'];
   $sql_choose = "select * from account_details where account_id=$acc_id";
   $result_choose=mysqli_query($conn,$sql_choose);
   $row_choose = mysqli_fetch_assoc($result_choose);
   $acc_type1=$row_choose['account_type'];
   if(strcasecmp($acc_type1,"admin")==0)
   {
	 include 'admin_navbar.php';
   }
   else{
	 include 'reg_user_navbar.php';
   }
    $acc_id=$_SESSION['id'];
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="search.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
              $fetchimages = mysqli_query($conn, "SELECT location,name,description,title,status FROM content WHERE media_type='image' and author_id=$acc_id");

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
                  <div>
                      <h3>Approval Status: <?= $items['status']; ?></h3>
                  </div>
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
                           <h1 style="color:#f7444e">OOPS!  No Images Found</h1>
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
        $fetchvideos = mysqli_query($conn, "SELECT distinct location,name,title,description,status  FROM content WHERE media_type='video' and author_id=$acc_id");

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
                  <div>
                      <h3>Approval Status: <?= $items['status']; ?></h3>
                  </div>
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
                   <h1 style="color:#f7444e">OOPS! No Videos Found</h1>
              </div>
          <?php
      }
      // Videos

      ?>


</div>

<!-- Audio Contents -->
<div class="main_tab_content" id="audio-content">

      <?php

      // Audio
        $fetchaudios = mysqli_query($conn, "SELECT distinct location,name,title,description,status  FROM content WHERE media_type='audio' and author_id=$acc_id");

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
                  <div>
                      <h3>Approval Status: <?= $items['status']; ?></h3>
                  </div>
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
                    $fetchweb = mysqli_query($conn, "SELECT distinct location,name,title,description,status  FROM content WHERE media_type='article' and author_id=$acc_id");

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
                                <div>
                      <h3 style="color:#f7444e">Approval Status: <?= $items['status']; ?></h3>
                  </div>
                            </div>       
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
