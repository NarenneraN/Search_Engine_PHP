<?php
include 'ConnectDatabase.php';
   include 'admin_navbar.php';
     $filtervalues=$_POST['searchQueryInput'];
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="search_result.css">

    </head>
    <body>
      <h1 class="py-3">Search results for <em>"<?php echo $filtervalues?>"</em></h1>
      <div class="tab">
  <button class="tablinks" id="defaultopen" onclick="openCity(event, 'img_res')">Images</button>
  <button class="tablinks" onclick="openCity(event, 'vid_res')">Videos</button>
  <!-- <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button> -->
</div>

<!-- Tab content -->
<!-- <div id="London" class="tabcontent">
  <h3>London</h3>
  <p>London is the capital city of England.</p>
</div>

<div id="Paris" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p>
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div> -->
        <div id="img_res" class="images_result tabcontent">

        <?php

        // Images
        $fetchimages = mysqli_query($conn, "SELECT distinct location,name FROM content natural join account_details WHERE CONCAT(fname,lname,name) LIKE '%$filtervalues%' ");
        while($row = mysqli_fetch_assoc($fetchimages)){
            $locationim = $row['location'];
              $nameim = $row['name'];
            echo "<div >";
            echo "<image src='".$locationim."' width='320px' height='200px' >";
            echo "<p>$nameim</p>";
            echo "</div>";

        }
        // Videos

        ?>

        </div>
<div id="vid_res" class="videos_results tabcontent">
<?php
$fetchvideos = mysqli_query($conn, "SELECT distinct location,name FROM content natural join account_details WHERE CONCAT(fname,lname,name) LIKE '%$filtervalues%'");
      while($row = mysqli_fetch_assoc($fetchvideos)){
          $locationvi = $row['location'];
          $namevi = $row['name'];
          echo "<div >";
          echo "<video src='".$locationvi."' controls width='320px' height='200px' >";
          echo "<p>hjvhjvjvjj</p>";
          echo "</div>";
      }
 ?>
</div>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "flex";
  evt.currentTarget.className += " active";
}
document.getElementById("defaultopen").click();
</script>
    </body>
</html>
