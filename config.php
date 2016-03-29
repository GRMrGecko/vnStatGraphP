<?php
//
//  config.php
//  vnStatGraphP
//
//  Created by Mr. Gecko on 3/28/16.
//  Copyright (c) 2016 Mr. Gecko's Media (James Coleman). All rights reserved. http://mrgeckosmedia.com/
//

//List of interfaces configured for vnStat.
$ifaceList = array("igb0");
//Optional readable title for interfaces.
$ifaceTitles = array("igb0" => "External");

//Graphs to be shown on load of the index.
$defaultGraphs = array(
	"vnstati.php?i=igb0&g=vs",
	"vnstati.php?i=igb0&g=d"
);

//Location for the binary of vnStatI.
$vnStatIBin = "/usr/local/bin/vnstati";

//Get configuration from parameters.
$iface = isset($_REQUEST['i']) ? $_REQUEST['i'] : "";
if (!in_array($iface, $ifaceList)) {
	$iface = $ifaceList[0];
}
$graph = isset($_REQUEST['g']) ? $_REQUEST['g'] : "vs";
switch($graph) {
	case "h":
	case "d":
	case "m":
	case "t":
	case "s":
	case "hs":
	case "vs":
	break;
	default:
	$graph = "vs";
}
$noHeader = isset($_REQUEST['nh']) ? (is_string($_REQUEST['nh']) ? empty($_REQUEST['nh']) || preg_match("/^(y|t|on).*/i", $_REQUEST['nh']) : boolval($_REQUEST['nh'])) : false;
$noEdge = isset($_REQUEST['ne']) ? (is_string($_REQUEST['ne']) ? empty($_REQUEST['ne']) || preg_match("/^(y|t|on).*/i", $_REQUEST['ne']) : boolval($_REQUEST['ne'])) : false;
$noLegend = isset($_REQUEST['nl']) ? (is_string($_REQUEST['nl']) ? empty($_REQUEST['nl']) || preg_match("/^(y|t|on).*/i", $_REQUEST['nl']) : boolval($_REQUEST['nl'])) : false;
$rateUnit = isset($_REQUEST['ru']) ? (is_string($_REQUEST['ru']) ? empty($_REQUEST['ru']) || preg_match("/^(y|t|on).*/i", $_REQUEST['ru']) : boolval($_REQUEST['ru'])) : false;
?>