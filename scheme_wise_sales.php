<?php include 'ConnectDatabase.php';?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          <?php
            $query="select * from barchart";
            $res=mysqli_query($conn,$query);
            while($data=mysqli_fetch_array($res)){
              $year=$data['year'];
              $sale=$data['sale'];
              $expenses=$data['expenses'];
              $profit=$data['profit'];
           ?>
           ['<?php echo $year;?>',<?php echo $sale;?>,<?php echo $expenses;?>,<?php echo $profit;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>

