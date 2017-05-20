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
			<div  id="blok">
			
				<?php
							if (!isset($_GET["blad"])) { //gdy nie ma w adresie indeksu blad

							}else {
								if ($_GET["blad"] == "zajety"){ //gdy wartosc indeksu = zajety (gdy login jest uzywany)
									blad_tworzenia2();
								}
								if ($_GET["blad"] == "istnieje"){//gdy wartosc indeksu = istenieje (gdy nazwa blogu juz istnieje)
									blad_tworzenia();
								}
							}
					?>
	<!--[zad f1]-->
				<h2>Stwórz nowy blog</h2>
					<form action="nowy.php" method="post"> 
							Nazwa bloga:<br/>
						<input type="text" name="nazwa_blogu" required/><strong style="color: red">*</strong><br />
							Nazwa użytkownika:<br/>
						<input type="text" name="nazwa_uzytkownika" required/><strong style="color: red">*</strong><br />
							Hasło:<br/>
						<input type="password" name="haslo" required/><strong style="color: red">*</strong><br />
							Opis blogu:<br/>
	<!--[zad s1.5]-->
						<textarea name="opis_blogu" cols="25" rows="4" wrap="soft"></textarea>	<br />
	<!--[zad f6]-->
						<input type="submit" value="Potwierdź"/>
						<input type="reset" value="Wyczyść"/>	
					</form>
					
			</div>	
	</div>


		<div id = "style_List">
			<div id="styleList"></div>
	</div>




</body>
</html>
