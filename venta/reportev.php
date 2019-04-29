<?php
  require('../php/conexion.php');
  $fecha1 = "";
  $fecha2 = "";

  if (!isset($_POST['submit'])) {
    header("Location: formReportes.php");
  }
  else {
    $fecha1 = $_POST['fecha1'];
    $fecha2 = $_POST['fecha2'];
  }

  //$sqlP = "SELECT Fecha, COUNT(Cantidad_Articulos) as Ventas FROM venta WHERE Fecha BETWEEN '2019-1-1' AND '2019-4-31' GROUP BY Fecha";//consultamos los tipos de usuario existentes, se usa para el registro
  $sqlP = "SELECT MONTH(Fecha) as Mes, COUNT(Cantidad_Articulos) as Ventas FROM venta WHERE Fecha BETWEEN '$fecha1' AND '$fecha2' GROUP BY MONTH(Fecha)";
  $resultP = $mysqli->query($sqlP);//ejecutamos la consulta y guardamos

  $sqlT = "SELECT MONTH(Fecha) as Fecha, Sum(Total) as Total FROM venta WHERE Fecha BETWEEN '$fecha1' AND '$fecha2' GROUP BY MONTH(Fecha)";//consultamos los tipos de usuario existentes, se usa para el registro
  $resultT = $mysqli->query($sqlT);//ejecutamos la consulta y guardamos

  $sqlT = "SELECT MONTH(Fecha) as Fecha, Sum(Total) as Total FROM compra WHERE Fecha BETWEEN '$fecha1' AND '$fecha2' GROUP BY MONTH(Fecha)";//consultamos los tipos de usuario existentes, se usa para el registro
  $resultC = $mysqli->query($sqlT);//ejecutamos la consulta y guardamos

  $sqlP = "SELECT P.Nombre, COUNT(Cantidad_Articulos) As Vendidos FROM detalle_venta D, producto P WHERE (P.Id_Producto=D.Id_Producto) GROUP by D.Id_Producto";//consultamos los tipos de usuario existentes, se usa para el registro
  $resultVP = $mysqli->query($sqlP);//ejecutamos la consulta y guardamos
 ?>

 <html>
   <head>
     <script type="text/javascript" src="http://mierp.tec:8081/venta/loader.js"></script>
     <script type="text/javascript">
       google.charts.load("current", {packages:["corechart"]});
       google.charts.setOnLoadCallback(drawChart);
       function drawChart() {
         var data = google.visualization.arrayToDataTable([
           ['Fecha', 'Ventas por Mes'],
           <?php
           while ($row = $resultP->fetch_assoc()) {
             echo "['Ventas el mes  ".$row['Mes']."',".$row['Ventas']."],";
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

     <script type="text/javascript">
     google.charts.load('current', {'packages':['bar']});
     google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
      var data = new google.visualization.arrayToDataTable([
        ['Fecha', 'Compras totales por mes($)'],
        <?php
        while ($row = $resultC->fetch_assoc()) {
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
          title: 'Totales de compras',
          subtitle: 'por mes' },
        axes: {
          x: {
            0: { side: 'top', label: 'Fechas'} // Top x-axis.
          }
        },
        bar: { groupWidth: "90%" }
      };

      var chart2 = new google.charts.Bar(document.getElementById('top_x_div1'));
      // Convert the Classic options to Material options.
      chart2.draw(data, google.charts.Bar.convertOptions(options));
    };
     </script>
     <script type="text/javascript">
     google.charts.load('current', {packages: ['corechart', 'bar']});
     google.charts.setOnLoadCallback(drawBasic);


function drawBasic() {
    var data = google.visualization.arrayToDataTable([
      ['Producto', 'Unidades totales vendidas'],
      <?php
      while ($row = $resultVP->fetch_assoc()) {
        echo "['".$row['Nombre']."',".$row['Vendidos']."],";
      }
       ?>
      //['Philadelphia, PA', 1526000, 1517000]
    ]);

    var options = {
        title: 'Ventas totales de productos',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Cantidades vendidas',
          minValue: 0
        },
        vAxis: {
          title: 'Producto'
        }
      };
    var chart3 = new google.visualization.BarChart(document.getElementById('chart_div'));
    chart3.draw(data, options);
  }
     </script>
   </head>
   <body>
     <h1>Reporte de ventas y compras del <?php echo $fecha1; ?> al <?php echo $fecha2; ?></h1>

     <div id="piechart_3d" style="width: 900px; height: 500px;"></div><br><br>
     <div id="top_x_div" style="width: 800px; height: 600px;"></div><br><br>
     <div id="top_x_div1" style="width: 800px; height: 600px;"></div>
     <div id="chart_div"></div><br>
   </body>
 </html>
