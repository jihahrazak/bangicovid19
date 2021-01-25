<?php
  $con = mysqli_connect("localhost","root","","covid1");
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
          ['Age', 'Death'],
         <?php
         $sql = "SELECT * FROM covid1";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['Age']."',".$result['Death']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Death rate according to Age in Malaysia'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script><center>
  </head>
  <body style='background-color:#75637F'>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
