<?php
require_once ("constant.php");

$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction

$oper = $_REQUEST['oper'];
$area = $_POST['area'];
$city = $_POST['city'];
$id = $_POST['id'];

if ($oper == "edit") {
	edit($id, $area, $city);
} else if ($oper == "add") {
	add($area, $city);
} else if ($oper == "del") {
	del($id);
}

function edit($id, $area, $city) {
	global $assets_map;
	$doc = new DOMDocument;
	$doc->load($assets_map["storeLocationArea"]);
	$area_sources = $doc->documentElement->getElementsByTagName('area');
	$count = 0;
	$firstElem = true;
	foreach ($area_sources as $area_source) {
		$firstElem = true;
		foreach ($area_source->childNodes as $city_source) {
			if ($city_source->nodeName != "city") {
				continue;
			}
			if ($firstElem) {
				$city_area = $city_source;
				$firstElem = false;
			} else {
				if ($count == $id) {
					if (strval($city_area->nodeValue) != $area) {
						$city_source->parentNode->removeChild($city_source);
						return add($area, $city);
					} else {
						$city_source->nodeValue = $city;
					}
				}
				$count++;
			}
		}
	}
	$doc->save($assets_map["storeLocationArea"]);
	$responce->success = true;
	echo json_encode($responce);
}

function del($id) {
	global $assets_map;
	$doc = new DOMDocument;
	$doc->load($assets_map["storeLocationArea"]);
	$firstElem = true;
	$area_sources = $doc->documentElement->getElementsByTagName('area');
	$count = 0;
	foreach ($area_sources as $area_source) {
		$firstElem = true;
		foreach ($area_source->childNodes as $city_source) {
			if ($city_source->nodeName != "city") {
				continue;
			}
			if ($firstElem) {
				$firstElem = false;
			} else {
				if ($count == $id) {
					$city_source->parentNode->removeChild($city_source);
					$doc->save($assets_map["storeLocationArea"]);
					$responce->success = true;
					echo json_encode($responce);
					return;
				}
				$count++;
			}
		}
	}
	$responce->success=false;
	echo json_encode($responce);
}

function add($area, $city) {
	global $assets_map;
	$doc = new DOMDocument;
	$doc->load($assets_map["storeLocationArea"]);
	$area_sources = $doc->documentElement->getElementsByTagName('area');
	$find = false;
	foreach ($area_sources as $area_source) {
		foreach($area_source->childNodes as $child){
			if($child->nodeName != "city") {continue;}
			$first_city = $child;
			break;
		}
		if (strval($first_city->nodeValue) == $area) {
			$new_node = $doc->createElement("city");
			$new_node->nodeValue = $city;
			$area_source->appendChild($new_node);
			$find = true;
			break;
		}
	}

	
	if (!$find) {
		$new_area = $doc->createElement("area");
		$new_city = $doc->createElement("city");
		$new_city->nodeValue = $area;
		$new_area->appendChild($new_city);
		$new_city = $doc->createElement("city");
		$new_city->nodeValue = $city;
		$new_area->appendChild($new_city);
		$doc->documentElement->appendChild($new_area);
	}

	$doc->save($assets_map["storeLocationArea"]);
	$responce->success = true;
	echo json_encode($responce);

}
?>
