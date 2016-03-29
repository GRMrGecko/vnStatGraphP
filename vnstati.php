<?php
//
//  vnstati.php
//  vnStatGraphP
//
//  Created by Mr. Gecko on 3/28/16.
//  Copyright (c) 2016 Mr. Gecko's Media (James Coleman). All rights reserved. http://mrgeckosmedia.com/
//

require("config.php");

//No caching as this is always changing.
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Content-type: image/png");

//Prepare extra arguments for executing the command.
$arguments = "";
if ($noHeader) {
	$arguments .= " -nh";
}
if ($noEdge) {
	$arguments .= " -ne";
}
if ($noLegend) {
	$arguments .= " -nl";
}
if ($rateUnit) {
	$arguments .= " -ru";
}

passthru($vnStatIBin." -i ".escapeshellarg($iface)." -".$graph.$arguments." -o -");
?>