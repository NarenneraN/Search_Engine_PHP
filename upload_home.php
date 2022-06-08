<?php include 'ConnectDatabase.php';
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
   if(isset($_POST['disp'])){
	   $nextone=$_POST['choice'];
	   if(strcmp($nextone,"image")==0)
	   {
		echo "<script>window.location.href = 'image_upload.php'</script>";
	   }
	   elseif(strcmp($nextone,"video")==0)
	   {
		echo "<script>window.location.href = 'video_upload.php'</script>";
	   }
	   elseif(strcmp($nextone,"audio")==0)
	   {
		echo "<script>window.location.href = 'audio_upload.php'</script>";
	   }
	   else
	   {
		echo "<script>window.location.href = 'website_upload.php'</script>";
	   }
   }
 
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="track_history_home.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
	<style>
	</style>
  </head>
  <body class="tracker">
    
    <div class="page_full">
		<div class="form_cont">
			<form action="" method="post">
				<div class="inp_div">
				<input type="radio" id="image" name="choice" value="image" required>
			<label for="image">Upload Image</label>
				</div>
				<div class="inp_div">
				<input type="radio" id="video" name="choice" value="video" required>
			<label for="video">Upload Video</label>
				</div>
				<div class="inp_div">
				<input type="radio" id="audio" name="choice" value="audio" required>
			<label for="audio">Upload Audio</label>
				</div>
				<div class="inp_div">
				<input type="radio" id="website" name="choice" value="website" required>
			<label for="website">Upload Website</label>
				</div>
			<input type="submit" name="disp" value="Next">
			
			
			</form>
			
		</div>
	</div>
  </body>
</html>
