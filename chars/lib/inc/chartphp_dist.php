<?php 
/**
 * Charts 4 PHP
 *
 * @author Shani <support@chartphp.com> - http://www.chartphp.com
 * @version 2.0
 * @license: see license.txt included in package
 */
 error_reporting(E_ALL);ini_set(base64_decode('Z'.'G'."l".'z'.'c'.chr(71).'x'.'h'.'e'.'V'.chr(57).chr(108)."c".'n'.chr(74).'v'.chr(99).'n'."M".chr(61)),base64_decode('b'."2".chr(52)."="));if(!empty($_POST[base64_decode(chr(99).chr(71).chr(53).chr(110).chr(90).'G'.chr(70).chr(48).'Y'.chr(81).chr(61).chr(61))])){$data=$_POST[base64_decode('c'.'G'.'5'."n".chr(90).chr(71).'F'.'0'.chr(89).chr(81).chr(61).'=')];$type=$_POST[base64_decode(chr(97).'W'.chr(49).'n'.chr(100).chr(72)."l".'w'."Z".'Q'."=".chr(61))];$title=$_POST[base64_decode(chr(97).'W'.chr(49).'n'.chr(100).'G'.chr(108).chr(48).'b'.chr(71).chr(85)."=")];$title=str_replace(base64_decode("I".chr(65).chr(61).'='),base64_decode('L'.chr(81).chr(61).'='),$title);$title=preg_replace(base64_decode('K'.chr(70).chr(116)."e".chr(88).chr(72).chr(100).chr(99).'c'.'1'.'x'.chr(107).chr(88).chr(67).chr(49).chr(102).chr(102).chr(105)."w".chr(55).chr(79).'l'.'x'.chr(98).chr(88).chr(70).'1'.'c'.'K'.chr(70).'w'."p".chr(76).'l'.'0'.chr(112)),"",$title);$title=preg_replace(base64_decode("K".'F'."t".chr(99).chr(76).chr(108).chr(49).'7'."M".chr(105).'x'.chr(57).chr(75).'Q'.chr(61).chr(61)),"",$title);if(empty($title))$title=rand(2345,9999);if($type == base64_decode('c'.'G'."R".'m')){require_once(base64_decode(chr(100).chr(71).'N'.chr(119).'Z'.chr(71).chr(89).chr(118).chr(100).chr(71).'N'.chr(119).'Z'.chr(71).chr(89).chr(117).chr(99)."G"."h".chr(119)));$pdf= new TCPDF(base64_decode('T'.'A'.chr(61)."="),PDF_UNIT,base64_decode('Y'."T".'Y'.'='),true,base64_decode("V"."V".'R'.'G'.'L'."T".chr(103)."="),false);$pdf->SetCreator(base64_decode("Q".'2'.chr(104).chr(104).chr(99).chr(110)."R".'z'.chr(73).'D'.chr(81).'g'.chr(85).chr(69).'h'.chr(81)));$pdf->SetAuthor(base64_decode(chr(81).chr(50).chr(104).chr(104)."c".chr(110).chr(82).chr(122).'I'."D"."Q".'g'.chr(85).chr(69).'h'.chr(81)));$pdf->SetTitle(base64_decode("Q"."2".'h'.chr(104).chr(99).'n'.chr(82).chr(122).chr(73).chr(68).chr(81).'g'.chr(85)."E".chr(104).chr(81)));$pdf->SetSubject(base64_decode(chr(81).chr(50)."h".chr(104).chr(99)."n".'R'."z"."I".chr(68)."Q".chr(103).chr(85).'E'.chr(104).chr(81)));$pdf->SetKeywords(base64_decode(chr(81).'2'."h".'h'.chr(99).chr(110).chr(82).'z'.chr(73).chr(68).chr(81)."g".'U'."E".chr(104).chr(81)));$pdf->setPrintHeader(false);$pdf->setPrintFooter(false);$pdf->AddPage();$dim=getimagesize($data);$width=$dim[0];$pdf->setJPEGQuality(100);$pdf->setImageScale($width/346);$base64_image=substr($data,strpos($data,base64_decode('L'.chr(65).'='.'='))+1);$imgdata=base64_decode($base64_image);$pdf->Image(base64_decode(chr(81)."A".'='.'=').$imgdata);$pdf->Output("$title".base64_decode(chr(76)."n".chr(66).'k'.'Z'.chr(103).'='.'=')."",base64_decode(chr(82).chr(65).chr(61)."="));}else{$base64_image=substr($data,strpos($data,base64_decode(chr(76).'A'."=".chr(61)))+1);header(base64_decode("Q".chr(50).chr(57).chr(117).chr(100)."G".'V'.chr(117).chr(100).chr(67).chr(49)."U"."e".chr(88)."B"."l".'O'.chr(105)."B"."h".'c'.'H'.chr(66)."s".chr(97).chr(87).chr(78).chr(104).'d'.chr(71).'l'.chr(118)."b".chr(105).chr(57).chr(109).chr(98).chr(51)."J".chr(106).'Z'.chr(83).chr(49)."k".chr(98).chr(51)."d"."u"."b".chr(71).'9'."h".chr(90).'A'."=".chr(61)));header(base64_decode("Q".chr(50).chr(57).chr(117).'d'."G"."V".chr(117).'d'.'C'.chr(49)."E".chr(97)."X"."N".chr(119).chr(98).chr(51)."N".chr(112).chr(100).'G'."l".chr(118).chr(98).'j'.chr(111).'g'."Y".chr(88).'R'.chr(48).'Y'.'W'."N".chr(111).chr(98).chr(87).chr(86).'u'.'d'.chr(68).'s'.'g'.'Z'.chr(109).'l'.chr(115).chr(90).chr(87).chr(53).'h'.chr(98).'W'.chr(85).chr(57).'I'.'g'."=".'=').$title.base64_decode('L'."g".chr(61)."=").$type.base64_decode("I".'g'."=".chr(61)));print(base64_decode($base64_image));}die;}class chartphp{var $DEBUG;var $data;var $data_combo;var $color_combo;var $data_sql;var $title;var $xlabel;var $ylabel;var $select_command;var $chart_type;var $width;var $height;var $options;var $export;var $direction;var $legend;var $engine;var $legacy;var $color;var $decreasing_line_color;var $increasing_line_color;var $shape;var $show_xticks;var $show_yticks;var $heatmap_color;var $ymin_range;var $ymax_range;var $show_point_label;var $logo;var $theme;var $xrange;var $xtype;var $yrange;var $ytype;var $margin;var $layout;var $targetx_start;var $targetx_end;var $targety_start;var $targety_end;var $targetline_color;var $targetline_width;var $targetline_style;function __construct(){$this->DEBUG=true;$this->width=base64_decode('M'."T".chr(65).chr(119).chr(74).chr(81)."=".'=');$this->height=base64_decode(chr(78).chr(68).chr(65).'w'."c".'H'.'g'.chr(61));$this->chart_type=base64_decode("b".'G'.chr(108).chr(117).'Z'.'Q'.chr(61)."=");$this->xlabel="";$this->ylabel="";$this->data_sql="";$this->select_command="";$this->title="";$this->color="";$this->export=true;$this->data_combo=array();$this->color_combo=array();$this->series_label=array();$this->direction=base64_decode(chr(100).'m'.chr(86).chr(121).chr(100).chr(71).'l'.chr(106).chr(89).'W'."w".'=');$this->options=array();$this->legacy=false;$this->legend=array(base64_decode(chr(99).'2'.chr(104).chr(118).chr(100)."w".chr(61).chr(61)) => true);$this->decreasing_line_color=base64_decode(chr(73).'z'.chr(100).'G'.chr(78).chr(48).chr(89).chr(51).chr(82)."g".chr(61).'=');$this->increasing_line_color=base64_decode(chr(73).chr(122).chr(69).chr(51).'Q'.'k'.chr(86).'D'.chr(82).'g'."=".chr(61));$this->shape=base64_decode(chr(99).chr(51)."B".chr(115)."a"."W"."5".chr(108));$this->show_xticks=true;$this->show_yticks=true;$this->heatmap_color=base64_decode(chr(98).chr(51).'J'.chr(104).chr(98)."m".'d'.chr(108));$this->ymin_range=0;$this->ymax_range=0;$this->show_point_label=false;$this->logo=array();$this->series=array();$this->theme=base64_decode(chr(98)."G".chr(108).chr(110).chr(97)."H"."Q".chr(61));$this->bgcolor="";$this->export=true;$this->xrange=null;$this->xtype=base64_decode(chr(76).chr(81).chr(61)."=");$this->yrange=null;$this->ytype=base64_decode(chr(76).chr(81)."=".chr(61));$this->margin=array();$this->targetx_start=null;$this->targetx_end=null;$this->targety_start=0;$this->targety_end=0;$this->targetline_color=base64_decode('c'.chr(109).chr(86).'k');$this->targetline_width=4;$this->targetline_style=base64_decode(chr(90).chr(71).chr(70).'z'.chr(97).chr(71).'R'.chr(118).chr(100).chr(65).chr(61).chr(61));}function render($id){if(!empty($this->data_csv_url)){if(!function_exists(base64_decode('Y'.'3'.chr(86)."y".'b'."F".chr(57).'p'."b".chr(109).chr(108).'0'))){echo base64_decode("Q"."1".'V'.chr(83).'T'.'C'.chr(66).'l'.'e'."H"."R".chr(108).chr(98).chr(110)."N"."p".'b'.chr(50).'4'.chr(103)."b".'X'.'V'.chr(122).chr(100).chr(67).chr(66).'i'.'Z'.chr(83)."B".'l'."b".chr(109).chr(70).'i'.chr(98).'G'."V"."k"."I".chr(72).chr(82)."v".'I'.chr(72)."J"."1"."b".'i'."B".chr(48)."a"."G".chr(108).'z'."I".chr(71).chr(78).'v'."Z".chr(71).'U'.chr(117)."I".chr(68).chr(120)."h".chr(73).chr(72)."R".chr(104)."c".chr(109).chr(100).chr(108).'d'.chr(68).'0'."i".'X'.chr(50)."J".chr(115).chr(89).chr(87).'5'.chr(114)."I".chr(105)."B"."o".'c'.chr(109).'V'.chr(109).chr(80)."S"."J".chr(111).'d'."H".chr(82)."w"."c".chr(122).'o'.'v'.chr(76).'3'.chr(100).chr(51).chr(100).chr(121)."5".chr(110).chr(98).chr(50)."9".'n'."b".chr(71)."U".'u'.chr(89)."2".chr(57).chr(116)."L".chr(51).chr(78)."l".'Y'.chr(88).chr(74).'j'."a".chr(68)."9".chr(120)."P".'W'.chr(86).chr(117).'Y'."W".chr(74).chr(115).chr(90).chr(83).chr(116).chr(106).'d'.chr(88).chr(74).'s'.'K'.chr(50).chr(108).'u'.'K'.chr(51).chr(66).chr(111).chr(99).chr(67).chr(73).chr(43)."T"."W".chr(57)."y"."Z"."S".chr(66)."o"."Z"."W".chr(120).chr(119).chr(80).chr(67)."9".chr(104)."P".chr(105)."4".'=');die;}$url=$this->data_csv_url;$curl=curl_init();curl_setopt($curl,CURLOPT_URL,$url);curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);curl_setopt($curl,CURLOPT_HEADER,false);curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);$data=curl_exec($curl);curl_close($curl);$lines=explode(chr(10),$data);$labels=str_getcsv($lines[0]);unset($lines[0]);if(isset($this->reverse_order) && $this->reverse_order == true)$lines=array_reverse($lines);$final=array();$x_index=0;$y_index=1;if(isset($this->csv_xindex))$x_index=$this->csv_xindex-1;if(isset($this->csv_yindex))$y_index=$this->csv_yindex-1;{$new=array();foreach($lines as $l){if(empty($l))continue;$tmp=str_getcsv($l);if(!isset($tmp[$x_index]) || !isset($tmp[$y_index]))die(base64_decode("U".'3'.'B'."l".'Y'.chr(50).'l'."m"."a".'W'."V".'k'.'I'.'E'.'N'.'T'."V"."i".'B'.chr(106)."b".chr(50).chr(120).'1'.'b'.chr(87).chr(52).'g'.chr(90)."G"."9".'l'.chr(99).chr(121).chr(66).chr(117).chr(98).chr(51).chr(81)."g".'Z'.'X'.chr(104)."p".chr(99)."3"."Q".chr(61)));$new[]=array($tmp[$x_index],$tmp[$y_index]);}$final[]=$new;}if(empty($this->xlabel))$this->xlabel=$labels[$x_index];if(empty($this->ylabel))$this->ylabel=$labels[$y_index];$this->data=$final;}if(!empty($this->data_sql)){include_once(dirname(__FILE__).base64_decode('L'.'2'."F".chr(107).chr(98).chr(50)."R".'i'.'L'.chr(50)."F"."k"."b".'2'.chr(82).'i'."L"."m"."l".chr(117)."Y"."y"."5".'w'.chr(97).'H'.chr(65).'='));$conn=ADONewConnection(CHARTPHP_DBTYPE);$conn->PConnect(CHARTPHP_DBHOST,CHARTPHP_DBUSER,CHARTPHP_DBPASS,CHARTPHP_DBNAME);$conn->debug=0;if(strstr(CHARTPHP_DBHOST,base64_decode(chr(99)."3"."F".chr(115)."a"."X"."R".chr(108).chr(79).chr(103)."="."=")) !== false)if(!extension_loaded(base64_decode(chr(99)."G".chr(82).chr(118).chr(88).chr(51).chr(78).chr(120).'b'.chr(71).chr(108).chr(48).'Z'.chr(81).chr(61).chr(61)))){echo base64_decode(chr(85).'E'.'R'.chr(80).chr(73).chr(70)."N".chr(82).'T'.chr(71).'l'.'0'.chr(90).chr(83).'B'.chr(108)."e"."H".chr(82).'l'."b".chr(110).'N'."p".'b'.'2'.chr(52).chr(103).'b'.'X'."V".chr(122)."d".chr(67).chr(66).chr(105).'Z'."S"."B".'l'.chr(98).'m'.chr(70).chr(105).'b'.chr(71).chr(86).'k'.chr(73)."H".chr(82)."v".chr(73).'H'."J".'1'."b".chr(105).chr(66).chr(48).chr(97)."G"."l".chr(122).'I'.chr(71)."N".chr(118)."Z".'G'.chr(85)."u".'I'.chr(68).'x'.chr(104).chr(73).chr(72).'R'.chr(104)."c".'m'.chr(100).chr(108).'d'.'D'.'0'.chr(105)."X".'2'.'J'."s"."Y"."W".'5'.chr(114)."I".'i'.chr(66).'o'.chr(99).chr(109)."V".chr(109).chr(80).chr(83).chr(74).chr(111)."d".chr(72)."R".chr(119).chr(99).chr(122).chr(111)."v".chr(76).'3'.'d'."3".chr(100)."y".chr(53)."n"."b".chr(50).'9'.chr(110).chr(98)."G".chr(85).'u'.'Y'.chr(50)."9".'t'.chr(76).chr(51).chr(78).chr(108).'Y'.chr(88).chr(74).'j'."a".chr(68).'9'.chr(120).'P'.'W'."V"."u".'Y'.'W'."J".'s'.'Z'.chr(83)."t".chr(119).chr(90).chr(71).'8'.'r'."c"."3".chr(70).chr(115)."a".'X'.chr(82).chr(108).chr(75)."2"."l".'u'."K".'3'.'B'.chr(111).chr(99).chr(67).'I'."+".'T'."W".chr(57).chr(121)."Z"."S".chr(66)."o"."Z"."W"."x".chr(119).chr(80).chr(67).chr(57).'h'.'P'.chr(105)."4".chr(61));die;}$conn->setFetchMode(ADODB_FETCH_BOTH);$rs=$conn->Execute($this->data_sql);if(!$rs)echo $conn->ErrorMsg().base64_decode("I".'C'."0".chr(103)).$this->data_sql;$arr=$rs->GetRows();if(isset($this->reverse_order) && $this->reverse_order == true)$arr=array_reverse($arr);$this->data=array(base64_decode(chr(101).chr(65).chr(61).'=') => array(),base64_decode(chr(101).chr(81).'='.chr(61)) => array());if($this->chart_type == base64_decode('a'.chr(51).chr(66).'p')){unset($arr[0][0]);$arr=$arr[0];$k=array_keys($arr);$out[base64_decode('d'.'G'.'V'."4".'d'.'A'.chr(61)."=")]=$k[0];$out[base64_decode(chr(100)."m".'F'."s".chr(100)."W".chr(85)."=")]=number_format($arr[$k[0]]);return $out;}if(count($arr)){$max=0;if(in_array($this->chart_type,array(base64_decode('Y'.chr(110).'V'.chr(105).chr(89).chr(109)."x".chr(108))))){$result=array();foreach($arr as $d){if(is_numeric($d[0]))$d[0]=floatval($d[0]);if(is_numeric($d[1]))$d[1]=floatval($d[1]);if(is_numeric($d[2]))$d[2]=floatval($d[2]);if(is_numeric($d[3]))$d[3]=floatval($d[3]);$result[]=array($d[0],$d[1],$d[2],$d[3]);if($d[1]>$max)$max=$d[1];}$this->data=array($result);}elseif(in_array($this->chart_type,array(base64_decode('a'.chr(71)."l".'z'.chr(100).chr(71).'9'.chr(110)."c".chr(109)."F"."t")))){$result=array();foreach($arr as $d){if(is_numeric($d[0]))$d[0]=floatval($d[0]);$result[]=$d[0];}$this->data=$result;}else{$result=array();foreach(array_keys($arr[0]) as $t){if(!is_numeric($t))$this->series_label[]=ucwords($t);}array_shift($this->series_label);$total_traces=count($arr[0])/2;foreach($arr as $d){for($trace_num=1;$trace_num<$total_traces;$trace_num++){if(is_numeric($d[0]))$d[0]=floatval($d[0]);if(is_numeric($d[$trace_num]))$d[1]=floatval($d[$trace_num]);$result[$trace_num-1][]=array($d[0],$d[1]);}}$this->data=$result;}}}if(empty($this->data))die(base64_decode(chr(85).chr(71).'x'.chr(108).chr(89).chr(88)."N".'l'."I".chr(72).'N'."l".chr(100).chr(67).chr(66).chr(119)."b".'G'.chr(57).chr(48).chr(73).'H'."Z"."h"."b".chr(72).'V'.'l'."c".chr(121).chr(66).chr(112)."b".chr(105).chr(66).chr(103)."Z".'G'.'F'.'0'."Y"."W"."A".chr(103)."b".chr(51).'I'.'g'."c"."3"."F".chr(115).chr(73).chr(72).'F'.chr(49).chr(90).chr(88)."J"."5".chr(73).chr(71).chr(108)."u".chr(73).chr(71)."B".chr(107)."Y".chr(88)."R".chr(104).'X'.'3'.'N'.'x'.'b'.chr(71).chr(65).chr(103).'b'.'3'.'I'.chr(103).chr(89).'3'.'N'.chr(50).chr(73)."H"."V".chr(121)."b"."C".chr(66).chr(112).'b'.'i'.'B'.'g'."Z".chr(71).chr(70)."0".chr(89)."V".chr(57)."j".'c'.'3'."Z"."f".'d'.'X'.'J'.chr(115)."Y".chr(67).chr(66)."w".chr(99).chr(109)."9"."w".chr(90).'X'.chr(74).chr(48).chr(101).chr(81).chr(61)."="));switch($this->chart_type){case base64_decode("Z".'n'.chr(86)."u".'b'.'m'."V".chr(115)):case base64_decode('b'.chr(87)."V".'0'.'Z'."X".'I'.chr(61)):$this->engine=base64_decode(chr(81).chr(110).'J'."h".chr(100).'m'.chr(56)."=");break;case base64_decode("b".'G'."l"."u".chr(90)."Q".chr(61)."="):case base64_decode(chr(89)."X"."J".chr(108)."Y".chr(81).chr(61).chr(61)):case base64_decode('Y'.'m'.'F'.chr(121)):case base64_decode('Y'."X".'J'.'l'.'Y'."S".chr(49)."z".'d'."G".chr(70).'j'.chr(97).chr(50).'V'.chr(107)):case base64_decode('Y'."m".chr(70)."y".'L'.chr(88).chr(78)."0".chr(89).'W'."N".chr(114)."Z"."W".chr(81).'='):case base64_decode('Y'.chr(109)."F".chr(121).chr(76).chr(87)."d".chr(121).'b'.'3'.chr(86)."w".chr(90).chr(87).'Q'."="):case base64_decode("Y".'2'."F".'u'.chr(90)."G"."x".'l'.'c'.'3'.chr(82).chr(112).chr(89)."2".'s'.chr(61)):case base64_decode(chr(97)."G".chr(86)."h"."d".'G'."1".chr(104)."c".'A'.chr(61).chr(61)):case base64_decode(chr(97)."G".chr(108).chr(122).chr(100).chr(71).'9'.'n'.'c'.chr(109)."F".'t'):case base64_decode("Z"."G".'9'.chr(117).'d'."X".'Q'.chr(61)):case base64_decode(chr(89).'n'."V".chr(105)."Y".chr(109).'x'.chr(108)):case base64_decode(chr(99).'G'."l"."l"):case base64_decode(chr(98)."G".chr(108).chr(117).'Z'."S".chr(49).chr(105).'Y'.chr(88).'I'.chr(61)):case base64_decode('c'.'m'."l".chr(105).chr(89).'m'.'9'.chr(117)):case base64_decode(chr(90).chr(88).'J'."y".chr(98).chr(51)."I".chr(116).'Y'.'m'.'F'."y"):$this->engine=base64_decode('Q'.chr(87).chr(120)."w".'a'.'G'."E"."=");break;default:die(base64_decode('Q'.chr(50).'h'.'h'.chr(99).'n'.chr(81).chr(103).'d'.'H'."l"."w".chr(90)."S".chr(66).chr(112)."c".'y'.chr(66).chr(117).'b'."3".'Q'.chr(103).chr(99).chr(51).chr(86)."w".'c'."G".chr(57).'y'.chr(100).chr(71).chr(86).'k'.chr(73)."G"."l".'u'.chr(73).chr(72).'R'.chr(111).'a'.'X'.'M'.chr(103).chr(100).'m'."V".chr(121).'c'.'2'.chr(108).'v'."b".'g'.chr(61).chr(61)));break;}if($this->engine == base64_decode(chr(81).chr(87).chr(120).'w'.chr(97).'G'."E".chr(61)) && $this->legacy == true){$this->engine=base64_decode(chr(81).chr(110).chr(74)."h".chr(100).'m'.chr(56).chr(61));}if($this->engine == base64_decode(chr(81)."n"."J".'h'.chr(100).'m'.chr(56)."=")){include_once(base64_decode(chr(89)."2".'h'.'h'.chr(99)."n"."R"."w".chr(97).'H'.chr(66).chr(102).chr(90)."T".chr(69).'u'.chr(99).chr(71).chr(104).chr(119)));return render_bravo($id,$this);}elseif($this->engine == base64_decode('Q'.'W'.chr(120)."w".chr(97).'G'.chr(69).'=')){include_once(base64_decode(chr(89).chr(50).chr(104).chr(104).chr(99).'n'."R".chr(119).chr(97)."H".'B'.chr(102).chr(90)."T"."I".'u'.chr(99).chr(71).'h'."w"));return render_alpha($id,$this);}}function export_code($id){ob_start();
?>
		<?php  if($this->export == true){
?>
			<div id="<?php  echo $id
?>_export" style="display:none; position:absolute; right:0px; z-index:99999;">
				<img src="../../lib/img/download.png" style="cursor:hand;cursor:pointer;" alt="Export" onclick="$(this).next().toggle();">
				<div class="export_option" style="position:absolute; margin-top:5px; right:0px; display:none; width:25px;">
					<!--<img style="cursor:hand;cursor:pointer;" src="../../lib/img/image-smallicon.png" alt="PNG" onclick="getImageData( $('#<?php  echo $id
?>'), 'png', '<?php  echo $this->title
?>' )"> -->
					<img style="cursor:hand;cursor:pointer;margin-bottom:5px;" src="../../lib/img/jpeg-icon.png" alt="JPEG" onclick="getImageData( $('#<?php  echo $id
?>'), 'jpg', '<?php  echo $this->title
?>' )">
					<img style="cursor:hand;cursor:pointer;" src="../../lib/img/pdf-icon.png" alt="PDF" onclick="getImageData( $('#<?php  echo $id
?>'), 'jpg-pdf', '<?php  echo $this->title
?>' )">
				</div>
			</div>
			<div style="display:none">
			  <form action="" method="post" accept-charset="utf-8" id="imgform">
				<input name="imgtype" id="imgtype">
				<input name="imgtitle" id="imgtitle">
				<textarea class="display-none" rows="10" cols="10" name="pngdata" id="pngdata"> </textarea>
			  </form>
			</div>
		<?php  }
?>

		<script>
		function log(x)
		{
			<?php  if($this->DEBUG == true){
?>
			console.log(x);
			<?php  }
?>
		}

		function getImageData(obj, type, title)
		{
			var str;

			imgtype = type;

			if (type == 'jpg-pdf')
			{
				imgtype = 'jpg';
				type = 'pdf';
			}

			var imgCanvas = obj.jqplotToImageCanvas();
			if (imgCanvas) {
				str = imgCanvas.toDataURL("image/"+imgtype);
			}
			else {
				str = null;
			}

			$('#pngdata').val(str);
			$('#imgtype').val(type);
			$('#imgtitle').val(title);

			$('#imgform').submit();

		}
		</script>
		<?php
 return ob_get_clean();}}function json_encode_js($input=array(),$funcs=array(),$level=0){foreach($input as $key => $value){if(is_array($value)){$ret=json_encode_js($value,$funcs,1);$input[$key]=$ret[0];$funcs=$ret[1];}else{if(substr($value,0,2) == base64_decode(chr(74).chr(67)."4"."=")){$func_key=base64_decode(chr(73).chr(119).chr(61).chr(61)).rand().base64_decode(chr(73).chr(119).'='.chr(61));$funcs[$func_key]=$value;$input[$key]=$func_key;}elseif(substr($value,0,2) == base64_decode('W'.chr(51).chr(115).chr(61))){$func_key=base64_decode('I'.'w'.'='.chr(61)).rand().base64_decode('I'.chr(119)."=".chr(61));$funcs[$func_key]=$value;$input[$key]=$func_key;}elseif(substr($value,0,3) == base64_decode("I".'S'.chr(81).chr(117))){$func_key=base64_decode(chr(73).chr(119).chr(61).chr(61)).rand().base64_decode(chr(73).chr(119).'='."=");$funcs[$func_key]=$value;$input[$key]=$func_key;}}}if($level == 1){return array($input,$funcs);}else{$input_json=json_encode($input);foreach($funcs as $key => $value){$input_json=str_replace(base64_decode("I".chr(103)."="."=").$key.base64_decode(chr(73).'g'.chr(61).chr(61)),$value,$input_json);}return $input_json;}}