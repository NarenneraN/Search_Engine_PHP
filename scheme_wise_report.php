<?php
 include 'ConnectDatabase.php';
 include 'admin_navbar.php'; 
?>
<html>
  <head>
      <style>
          body{
              background-color:#181818;
              height:100vh;
              padding:30px 10px 30px 100px;
          }
          .page{
              width:100%;
              height:100%;
              display:flex;
              justify-content:center;
              align-items:center;
          }
          #piechart{
              border-radius:30px;
          }
      </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['students', 'contribution'],
         <?php
         $sql = "SELECT * FROM scheme_report";
         $fire = mysqli_query($conn,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['scheme_type']."',".$result['no_of_person']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Scheme Wise Report'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  <div class="page">
  <div id="piechart" style="width: 900px; height: 500px;"></div>
  </div>
    
  </body>
</html>