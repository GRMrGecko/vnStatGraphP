<?php
//
//  index.php
//  vnStatGraphP
//
//  Created by Mr. Gecko on 3/28/16.
//  Copyright (c) 2016 Mr. Gecko's Media (James Coleman). All rights reserved. http://mrgeckosmedia.com/
//

require("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="Copyright" content="Copyright (c) 2016 Mr. Gecko's Media (James Coleman). All rights reserved. http://mrgeckosmedia.com/" />
	<meta name="Author" content="James Coleman" />
	<title>vnStat GraphP</title>
	<style type="text/css">
	#optionsBox {
		border-style: solid;
		border-color: #afafaf;
		border-width: 1pt;
		
		padding: 3pt;
		width: 490px;
	}
	#optionsTitle {
		background-color: #5f5f5f;
		color: #ffffff;
		margin: -1pt;
		padding: 2pt;
		padding-left: 5pt;
	}
	#optionsBox hr {
		color: #afafaf;
	}
	label.optionName {
		width: 50pt;
	}
	span.optionContainer {
		
	}
	</style>
</head>
<body>
	<?
	if (!isset($_REQUEST['i']) && count($defaultGraphs)>=1) {
		foreach ($defaultGraphs as $thisGraph) {
			?><img src="<?=$thisGraph?>" /><br /><?
		}
		?><br /><br /><?
	}
	?>
	<form action=""><div id="optionsBox">
		<div id="optionsTitle">vnStatGraphP Options</div><br />
		<label class="optionName" for="iface">Interface:</label>
		<span class="optionContainer"><select name="i" id="iface"><?
		foreach ($ifaceList as $interface) {
			$name = $interface;
			if (!empty($ifaceTitles[$interface])) {
				$name = $interface." - ".$ifaceTitles[$interface];
			}
			?><option value="<?=$interface?>"<?=($iface==$interface ? " selected" : "")?>><?=$name?></option><?
		}
		?></select></span><br />
	
		<label class="optionName" for="graph">Graph:</label>
		<span class="optionContainer"><select name="g" id="graph">
			<option value="vs"<?=($graph=="vs" ? " selected" : "")?>>Vertical summary with hours</option>
			<option value="hs"<?=($graph=="hs" ? " selected" : "")?>>Horizontal summary with hours</option>
			<option value="s"<?=($graph=="s" ? " selected" : "")?>>Summary</option>
			<option value="t"<?=($graph=="t" ? " selected" : "")?>>Top 10</option>
			<option value="m"<?=($graph=="m" ? " selected" : "")?>>Months</option>
			<option value="d"<?=($graph=="d" ? " selected" : "")?>>Days</option>
			<option value="h"<?=($graph=="h" ? " selected" : "")?>>Hours</option>
		</select></span><br />
	
		<label class="optionName" for="noHeader">No Header:</label>
		<span class="optionContainer"><input type="checkbox" name="nh" id="noHeader"<?=($noHeader ? " checked" : "")?> /></span><br />
	
		<label class="optionName" for="noEdge">No Edge:</label>
		<span class="optionContainer"><input type="checkbox" name="ne" id="noEdge"<?=($noEdge ? " checked" : "")?> /></span><br />
	
		<label class="optionName" for="noLegend">No Legend:</label>
		<span class="optionContainer"><input type="checkbox" name="nl" id="noLegend"<?=($noLegend ? " checked" : "")?> /></span><br />
	
		<label class="optionName" for="rateUnit">Rate Unit:</label>
		<span class="optionContainer"><input type="checkbox" name="ru" id="rateUnit"<?=($rateUnit ? " checked" : "")?> /></span> - Swap configured rate unit<br />
		<hr />
		<input type="submit" value="Generate Graph" />
	</div></form><br />
	<?
	if (isset($_REQUEST['i']) || count($defaultGraphs)==0) {
		$data = "i=".urlencode($iface);
		$data .= "&g=".$graph;
		if ($noHeader) {
			$data .= "&nh";
		}
		if ($noEdge) {
			$data .= "&ne";
		}
		if ($noLegend) {
			$data .= "&nl";
		}
		if ($rateUnit) {
			$data .= "&ru";
		}
		?>
		<span id="vnStatResult"><img src="vnstati.php?<?=$data?>" /></span>
	<?}?>
</body>
</html>