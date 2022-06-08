<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Tags Input Box | CodingNepal</title>
    <link rel="stylesheet" href="tags_style.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Unicons CDN Link for Icons -->
    <script src="https://kit.fontawesome.com/afc6005920.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">
  </head>
  <body>
    <?php include "admin_navbar.php" ?>
    <div class="wrapper">
      <div class="title">
        <i class="fas fa-tags"></i>
        <h2>Keywords</h2>
      </div>
      <div class="content">
        <p>To Add Keyword Press Enter</p>
        <ul><input type="text" spellcheck="false"></ul>
      </div>
      <div class="details">
        <p>Minimum<span>5</span> keywords are remaining</p>
        <button>Remove All</button>
      </div>
    </div>
    <div class="button">
      <input type="submit" value="FINISH UPLOADING">
    </div>
    <script src="tags_dyn.js"></script>
  </body>
</html>
