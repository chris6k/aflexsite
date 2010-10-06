
<?php

require_once("constant.php");
 
//开始日期
$begin_date = date('Y-m-d', time() - 7 * 24 * 60 * 60);
//今天
$end_date = date('Y-m-d', time() + 7 * 24 * 60 * 60);

loadXML($_REQUEST["path"]);
	
function loadXML($path) {
	try{
	global $assets_map;
	$xmlPath = $assets_map[$path];
	$xml = simplexml_load_file($xmlPath);
	$count = 0;
	$area = "";
	$firstElem = true;
	$responce->page = 1;
	$responce->total = 1;
	foreach ($xml->children() as $child) {
		if ($path == "storeLocationArea" && $child->getName() == "area") {
			$firstElem = true;
			foreach ($child->children() as $city) {
				if ($firstElem) {
					$area = $city;
					$firstElem = false;
				} else {
					$responce->rows[$count]['id'] = $count;
					$responce->rows[$count]['cell'] = array (strval($area),strval($city));
					$count++;
				}
			}
		}
	}
	$responce->records = $count;
	echo json_encode($responce);
	}catch(Exception $e) {
		die("load xml failure!![".$path."]");
	}
}
?>
