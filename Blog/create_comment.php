<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Zakładanie bloga</title>
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
	
<!--[zad f3]-->
		<div id="blok">
			<form action="koment.php" method="post">
				Rodzaj komentarza:
				<select name="rodzaj">
					<option value="pozytywny">Pozytywny</option>
					<option value="negatywny">Negatywny</option>
					<option value="neutralny">Neutralny</option>
				</select><br/>
				Treść komentarza:<br/><textarea name="komentarz" cols="30" rows="4" wrap="soft"></textarea><br/>
				<br/>
				Pseudonim: <input type="text" name="pseudonim" required/><strong style="color: red">*</strong><br/>
				<br/>
				<input type="submit" value="Potwierdź">
				<input type="reset" value="Wyczyść">	
			</form></div>		
	
		</div>	
		

</div>

	<div id = "style_List">
			<div id="styleList"></div>
	</div>



</body>
</html>