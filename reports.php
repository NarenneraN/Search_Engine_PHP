<?php include 'ConnectDatabase.php';
   include 'admin_navbar.php'; 
   if(isset($_POST['disp'])){
	   $nextone=$_POST['choice'];
	   if(strcmp($nextone,"renewal")==0)
	   {
		echo "<script>window.location.href = 'admin_renewal_track.php'</script>";
	   }
	   elseif(strcmp($nextone,"payments")==0)
	   {
		echo "<script>window.location.href = 'admin_renewal_track.php'</script>";
	   }
	   else
	   {
		echo "<script>window.location.href = 'search_track_history.php'</script>";
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
  </head>
  <body class="tracker">
    
    <div class="page_full">
		<div class="form_cont">
			<form action="" method="post">
				<div class="inp_div">
				<input type="radio" id="renewal" name="choice" value="renewal" required>
			<label for="renewal">Renewal History</label>
				</div>
				<div class="inp_div">
				<input type="radio" id="payments" name="choice" value="payments" required>
			<label for="payments">Payments History</label>
				</div>
				<div class="inp_div">
				<input type="radio" id="search" name="choice" value="search" required>
			<label for="search">Search History</label>
				</div>
			<input type="submit" name="disp" value="Display Results">
			
			
			</form>
			
		</div>
	</div>
  </body>
</html>
