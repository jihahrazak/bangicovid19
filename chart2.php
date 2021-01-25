<?php
  $con = mysqli_connect("localhost","root","","covid2");
  if($con){
    echo "";
  }
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><br><br><br><br>
   <center><script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['States', 'Cases'],
         <?php
         $sql = "SELECT * FROM covid2";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['States']."',".$result['Cases']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Number of Covid-19 cases according to states in Malaysia (2020)'
        };

        var chart = new google.visualization.BarChart(document.getElementById('barchart'));

        chart.draw(data, options);
      }
    </script><center>
  </head>
  <body style='background-color:#75637F'>
    <div id="barchart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
