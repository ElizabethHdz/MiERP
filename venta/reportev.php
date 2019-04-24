<?php
  require('../php/conexion.php');

  $sqlP = "SELECT Fecha, Cantidad_Articulos FROM venta WHERE Fecha BETWEEN '2019-1-1' AND '2019-3-31';";//consultamos los tipos de usuario existentes, se usa para el registro
  $resultP = $mysqli->query($sqlP);//ejecutamos la consulta y guardamos
 ?>


 <html>
   <head>
     <script type="text/javascript" src="loader.js"></script>
     <script type="text/javascript">
       google.charts.load("current", {packages:["corechart"]});
       google.charts.setOnLoadCallback(drawChart);
       function drawChart() {
         var data = google.visualization.arrayToDataTable([
           ['Task', 'Hours per Day'],
           <?php
           while ($row = $resultP->fetch_assoc()) {
             echo "['Ventas el ".$row['Fecha']."',".$row['Cantidad_Articulos']."],";
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
     </script>
   </head>
   <body>
     <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
   </body>
 </html>
