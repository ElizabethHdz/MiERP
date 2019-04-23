<?php
/**
 * Charts 4 PHP
 *
 * @author Shani <support@chartphp.com> - http://www.chartphp.com
 * @version 2.0
 * @license: see license.txt included in package
 */

include("../php/conexion.php");
include("../lib/inc/chartphp_dist.php");
include(CHARTPHP_LIB_PATH . "../lib/inc/chartphp_dist.php");

$p = new chartphp();

$bar_chart_data =
array(
	array(
		array("2010/12",48.25),
		array("2011/01",238.75),
		array("2011/02",95.50),
		array("2011/03",300.50),
		array("2011/04",286.80),
		array("2011/05",148.25),
		array("2011/06",128.75),
		array("2011/07",95.50),
		array("2011/08",200.50),
		array("2011/09",216.80),
		array("2011/10",248.25),
		array("2011/11",148.25),
		array("2011/12",318.75),
		array("2012/01",295.50),
		array("2012/02",30.50),
		array("2012/03",236.80),
		array("2012/04",367)
		)
	);

$p->data=$bar_chart_data;
$p->chart_type = "bar";

// Common Options
$p->title = "Bar Chart";
$p->xlabel = "Months";
$p->ylabel = "Purchase";
$p->show_xticks = true;
$p->show_yticks = true;
$p->show_point_label = true;
$p->targetx_start = "2010/12";
$p->targetx_end = "2012/04";
$p->targety_start = 250;
$p->targety_end = 250;
$p->targetline_color = "purple";
$p->targetline_width = 4;
$p->targetline_style = "dashdot";  //line

$out = $p->render('c1');
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../lib/js/chartphp.css">
        <script src="../lib/js/jquery.min.js"></script>
        <script src="../lib/js/chartphp.js"></script>
    </head>
    <body>
        <div>
            <?php echo $out; ?>
        </div>
    </body>
</html>
