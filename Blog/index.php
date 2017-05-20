<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Przeglądanie bloga</title>
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
		<link href="styl.css" media="screen" rel="stylesheet" title="main"/>
		<link href="styl2.css" media="screen" rel="alternate stylesheet" title="inny"/>
		<script type="text/javascript" src="style.js"></script>
	</head>
	<body onload="listStyles()">


	<div id="main">
	
	<?php
		include 'funkcje.php';
		menu();
	?>
		<div style="margin-left: 50px">
			<h1>Witaj na moim blogu! :) </h1>
		</div>	
	</div>
	
	<div id = "style_List">
			<div id="styleList"></div>
	</div>
	
	</body>
</html>
