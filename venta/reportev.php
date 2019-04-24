<?php
  require('../php/conexion.php');

  $sqlP = "SELECT Fecha, COUNT(Cantidad_Articulos) as Ventas FROM venta WHERE Fecha BETWEEN '2019-1-1' AND '2019-3-31' GROUP BY Fecha";//consultamos los tipos de usuario existentes, se usa para el registro
  $resultP = $mysqli->query($sqlP);//ejecutamos la consulta y guardamos

  $sqlT = "SELECT Fecha, Sum(Total) as Total FROM venta WHERE Fecha BETWEEN '2019-1-1' AND '2019-3-31' GROUP BY Fecha";//consultamos los tipos de usuario existentes, se usa para el registro
  $resultT = $mysqli->query($sqlT);//ejecutamos la consulta y guardamos
 ?>

 <html>
   <head>
     <script type="text/javascript" src="loader.js"></script>
     <script type="text/javascript">
       google.charts.load("current", {packages:["corechart"]});
       google.charts.setOnLoadCallback(drawChart);
       function drawChart() {
         var data = google.visualization.arrayToDataTable([
           ['Fecha', 'Ventas por día'],
           <?php
           while ($row = $resultP->fetch_assoc()) {
             echo "['Ventas el ".$row['Fecha']."',".$row['Ventas']."],";
           }
            ?>
           //['Work',     11],
         ]);

         var options = {
           title: 'Mis Ventas',
           is3D: true,
         };

         var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
         chart.draw(data, options);
       }


       //SEGUNDA GRAFICA
       google.charts.load('current', {'packages':['bar']});
       google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Fecha', 'Ventas totales($)'],
          <?php
          while ($row = $resultT->fetch_assoc()) {
            echo "['".$row['Fecha']."',".$row['Total']."],";
          }
           ?>
          //["Queen's bishop pawn (c4)", 10],
          //['Other', 3]
        ]);

        var options = {
          width: 800,        
          legend: { position: 'none' },
          chart: {
            title: 'Totales de ventas',
            subtitle: 'por fechas' },
          axes: {
            x: {
              0: { side: 'top', label: 'Fechas'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart1 = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart1.draw(data, google.charts.Bar.convertOptions(options));
      };
     </script>
   </head>
   <body>
     <div id="piechart_3d" style="width: 900px; height: 500px;"></div><br><br>
     <div id="top_x_div" style="width: 800px; height: 600px;"></div>
   </body>
 </html>
