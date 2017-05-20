<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Zakładanie bloga</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<link href="styl.css" media="screen" rel="stylesheet" title="main"/>
	<link href="styl2.css" media="screen" rel="alternate stylesheet" title="inny"/>

	<script type="text/javascript" src="style.js"></script>	
	<script type="text/javascript" src="chat.js"></script>	
	
</head>
<body onload="listStyles()">


<div id="main">
	
	<?php
		include 'funkcje.php';
		menu();
	?>
	
		<div id="blok">
				<input type="checkbox" name="check" id="check" onchange="update();"/>Uruchom chat<br/>
				<textarea rows="20" cols="80" id="chat" style="background: #FFF; color:black" disabled></textarea><br/>
				Podaj nick: <input type="text" name="nick" id="nick" /><br/>
				Wpisz wiadomość: <br/><input type="text" name="message" id="message" /><br/>
				<button type="button" value="Wyślij" onclick="if (checked() && checkValues()) { send(); } else { alert('Uruchom czat a następnie wpisz nick i wiadomość'); }">Wyślij</button>
				<br/><br/><br/>

				<div id="debug"></div>
		
		</div>
		
</div>

	<div id = "style_List">
			<div id="styleList"></div>
	</div>



</body>
</html>