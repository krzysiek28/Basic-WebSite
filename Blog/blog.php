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

																		<!--[zad s4]-->
																		
<div id="main">
		
	<?php
		include 'funkcje.php';
		menu();
	?>
	
	<div  id="blok">
	
	<?php
		function lista_blogow() {
			$blogi = glob('*', GLOB_ONLYDIR); // Uzyskanie tablicy zawierajacej tylko katalogi
			echo "<ul>";
			foreach ($blogi as &$blog) {
				echo "<li><a href=blog.php?nazwa=$blog>$blog</a></li>";	//wyswietlenie istniejacych blogow
			}
			echo "</ul>";
		}
		
//[zad s4.3]
		if (!isset($_GET["nazwa"])) { // jesli nie zostal podany indeks nazwa
			echo "	<h2>Lista blogów:</h2>";
			lista_blogow();
//[zad 4.2]
		} elseif (!is_dir(htmlspecialchars($_GET["nazwa"]))) { // jesli nie istnieje blog o nazwie pod indeksem nazwa
			echo "Nie znaleziono bloga!<br/>Lista dostępnych blogów:";
			lista_blogow();
		} else { // jesli podany indeks i blog istnieje
//[zad s4.1]
			$blog = htmlspecialchars($_GET["nazwa"]); //Konwertuje znaki specjalne na znaczniki HTML.
			echo "<h1>Blog <strong style=\"color: white\">".$blog."</strong><br/></h1>"; //wyswietlenie nazwy blogu
			$pliki = array_filter(glob($blog.'/*'), 'is_file'); // tablica zawierajaca tylko pliki
			$tab_plikow = array_diff($pliki, array($blog.'/info')); // Usuniecie pliku info z tablicy plikow
			arsort($tab_plikow); // funkcja sortuje od najnowszego
			foreach ($tab_plikow as &$tab) {
				if (preg_match('/^'.preg_quote($blog, '/').'\/[0-9]*$/', $tab)) { // Listowanie tylko wpisow, bez zalaczonych plikow
					echo "<h3>Wpis:</h3>";
					$read = file($tab);
					echo "<p>";
					foreach ($read as &$linia) {
						echo $linia."<br/>";
					}
					echo "</p>";
					$ilosc = 0;
					foreach ($tab_plikow as &$file) {
						if (preg_match('/^'.preg_quote($tab, '/').'[1-9]\..*$/', $file)) { // Listowanie tylko zalaczonych plikow
							if ($ilosc == 0) { // Żeby tylko raz wypisywalo naglowek i tylko wtedy gdy zalaczniki sa dodane do wpisu
							echo "<h4>Załączone pliki:</h4>";
							$ilosc++;
							}
							echo "<a href=\"$file\">".basename($file)."</a><br/>";
						}
					}
						echo "<br/>";
						if (is_dir($tab.'.k')) { // Sprawdzenie czy komentarze istnieja
							echo "<h4>Komentarze:</h4>";
							$koms = array_filter(glob($tab.'.k/*'), 'is_file'); // pobranie do tablicy plikow komentarzy
							arsort($koms);
							foreach($koms as &$kom) {
								$read = file($kom);
								echo "<p>";
								$i = 0;
								foreach ($read as &$linia) { // Odczytanie komentarza bez ostatniej linii (bez IP)
									if ($i != (count($read) - 1)) {
										echo $linia."<br/>";
									}
									$i++;
								}
								echo "</p>";
							}
						}
						echo "<a href=\"create_comment.php?$tab\">Dodaj komentarz.</a></p><br/>";
										
				}
			}
		}
		
	?>
		
	</div>	
</div>

	<div id = "style_List">
			<div id="styleList"></div>
	</div>

</body>
</html>