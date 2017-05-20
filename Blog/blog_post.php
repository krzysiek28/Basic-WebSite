<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Zakładanie bloga</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<link href="styl.css" media="screen" rel="stylesheet" title="main"/>
	<link href="styl2.css" media="screen" rel="alternate stylesheet" title="inny"/>
	<script src="blog_post_wpis.js"></script>
	<script type="text/javascript" src="style.js"></script>
</head>
<body onload="initDateAndTime(); listStyles()">


<div id="main">
	
	<?php
		include 'funkcje.php';
		menu();
	?>
	
		<div style="margin-left: 50px">
		
				<?php
						if (!isset($_GET["blad"])) { //gdy nie ma w adresie indeksu blad

						}else {
							if ($_GET["blad"] == "blad_logowania"){ //gdy wartosc indeksu = zajety (gdy login jest uzywany)
								blad_logowania();
							} 
						}
				?>
<!--[zad f2]-->
			<h2>Dodaj wpis</h2>
				<form enctype="multipart/form-data" action="wpis.php" method="post"> 
						Nazwa użytkownika:<br/>
					<input type="text" name="nazwa_uzytkownika" required/><strong style="color: red">*</strong><br />
						Podaj hasło:<br/>
					<input type="password" name="haslo" required/><strong style="color: red">*</strong><br />
						Wpis:<br/>
					<textarea name="wpis" cols="25" rows="4" wrap="soft"></textarea>	<br />
					
					<div>
						Data:<br/>
						<input type="text" name="date" onchange="checkDate();"/>
					</div>
					<div>
						Godzina:<br/>
						<input type="text" name="time" onchange="checkTime();"/>
					</div>
					<div id="addAttachmentButtons">
						Załączniki:<br/>
					</div>
					<div>
						<br/>
						<input type="button" value="Dodaj więcej załączników" onclick="addNewFileInputElement()"/>
					</div>
					<div>
						<br/><input type="submit" value="Wyślij"/>
						<input type="reset" value="Wyczyść"/>
					</div>
					

				</form>		
		</div>


	<div id = "style_List">
			<div id="styleList"></div>
	</div>




		
</div>


</body>
</html>