<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/afc6005920.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="admin_upload_style.php">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <?php include "admin_navbar.php" ?>
  <div class="page">
    <div class="wrapper">
      <header>Upload Files</header>
      <form action="#">
        <input class="file-input" type="file" name="file" hidden>
        <i class="fas fa-file-upload"></i>
        <p>Browse File to Upload</p>
      </form>
      <section class="progress-area"></section>
      <section class="uploaded-area"></section>
    </div>
    <div class="upload_details">
       <div class="title_inp">

       </div>
       <div class="block_cont">
         <div class="container">
        <h1>UPLOAD TYPE</h1>

        <div class="group">
          <input type="checkbox" id="xd" >
          <label for="xd">Web Page</label>
        </div>
        <div class="group">
          <input type="checkbox" id="figma">
          <label for="figma">Video/Audio</label>
        </div>

        <div class="group">
          <input type="checkbox" id="sketch" >
          <label for="sketch">Image</label>
        </div>
       </div>
       </div>

    </div>

  </div>
  <a href="tags.php">
    <div class="button">
      <input type="submit" value="NEXT">
    </div>
  </a>



  <script src="admin_upload_dyn.js"></script>

</body>
</html>
