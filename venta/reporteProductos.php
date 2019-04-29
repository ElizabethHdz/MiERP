<?php
  require('../php/conexion.php');
  if (!isset($_POST['submit'])) {
    header("Location: formReportes.php");
  }
  $idP = $_POST['producto'];

  $nombre = "SELECT Nombre FROM producto WHERE Id_Producto='$idP'";
  $nombre = $mysqli->query($nombre);
  $nombre = $nombre->fetch_assoc();
  $nombre = $nombre['Nombre'];

  $sqlP = "SELECT P.Nombre, SUM(Cantidad_Articulos) As Vendidos FROM detalle_venta D, producto P WHERE (P.Id_Producto=D.Id_Producto) GROUP by D.Id_Producto";//consultamos los tipos de usuario existentes, se usa para el registro
  $resultP = $mysqli->query($sqlP);//ejecutamos la consulta y guardamos

  $sqlP = "SELECT V.Fecha, SUM(D.Cantidad_Articulos) As Vendidos FROM detalle_venta D, venta V WHERE (V.Folio=D.Folio_Venta) AND D.Id_Producto='$idP' GROUP by V.Fecha";//consultamos los tipos de usuario existentes, se usa para el registro
  $resultSales = $mysqli->query($sqlP);//ejecutamos la consulta y guardamos

  $sqlP = "SELECT C.Fecha, SUM(D.Cantidad_Articulos) As Comprados FROM detalle_compra D, compra C WHERE (C.Folio=D.Folio_Compra) AND D.Id_Producto='$idP' GROUP by C.Fecha";//consultamos los tipos de usuario existentes, se usa para el registro
  $resultCompras = $mysqli->query($sqlP);//ejecutamos la consulta y guardamos
 ?>

 <html>
   <head>
     <script type="text/javascript" src="loader.js"></script>
     <script type="text/javascript">
     google.charts.load('current', {packages: ['corechart', 'bar']});
     google.charts.setOnLoadCallback(drawBasic);


function drawBasic() {
    var data = google.visualization.arrayToDataTable([
      ['Producto', 'Unidades totales vendidas',  { role: 'style' }],
      <?php
      while ($row = $resultP->fetch_assoc()) {

        if ($row['Nombre'] == $nombre) {
            echo "['".$row['Nombre']."',".$row['Vendidos'].","."'red'"."],";
        } else {
            echo "['".$row['Nombre']."',".$row['Vendidos'].","."'blue'". "],";
        }

        //echo "['".$row['Nombre']."',".$row['Vendidos']."],";
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
    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }


  //segundo reporte
  google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Cantidad de articulos vendidos'],
          <?php
          while ($row = $resultSales->fetch_assoc()) {
            echo "['".$row['Fecha']."',".$row['Vendidos']."],";
          }
           ?>
          //['2007',  1030]
        ]);

        var options = {
          title: 'Ventas dentro del periodo',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart1 = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart1.draw(data, options);
      }

      //tercer reorte de compras
     </script>
     <script type="text/javascript">

           google.charts.load('current', {'packages':['corechart']});
               google.charts.setOnLoadCallback(drawChart);

               function drawChart() {
                 var data = google.visualization.arrayToDataTable([
                   ['Fecha', 'Cantidad de articulos comprados'],
                   <?php
                   while ($row = $resultCompras->fetch_assoc()) {
                     echo "['".$row['Fecha']."',".$row['Comprados']."],";
                   }
                    ?>
                   //['2007',  1030]
                 ]);

                 var options = {
                   title: 'Compras dentro del periodo',
                   curveType: 'function',
                   legend: { position: 'bottom' }
                 };

                 var chart2 = new google.visualization.LineChart(document.getElementById('curve_chart2'));

                 chart2.draw(data, options);
               }
     </script>
   </head>
   <body>

     <h1>Reporte de ventas/compras de <?php echo $nombre ?></h1>
      <div id="chart_div"></div><br>
      <div id="curve_chart" style="width: 900px; height: 500px"></div><br><br>
      <div id="curve_chart2" style="width: 900px; height: 500px"></div><br><br>
   </body>
 </html>
