<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Przeglądanie bloga</title>
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
		<script src="blog_post_wpis.js"></script>
	</head>
	<body>

																	<!--[zad s2]-->

	<?php
		
		// Szukanie bloga nalezacego do uzytkownika
		$katalogi = glob('*', GLOB_ONLYDIR); // Uzyskanie tablicy zawierajacej tylko katalogi
		$liczba_katalogow = count($katalogi);	//pozyskujemy liczbe katalogów
		$iterator = 0; //potrzebny do stwierdzenia czy blog nie istnieje
		
//[zad s2.3] - nazwa blogu jest weryfikowana przez login i hasło
		foreach ($katalogi as & $blog) {
			$info = fopen($blog."/info","r");  //otwarcie pliku do odczytu z bazą kont
			$read_info = fread($info, filesize($blog."/info")); //plik zostal przeczytany do filesize
			fclose($info);
//[zad s2.1]
			$data = explode("\n", $read_info); //explode pokroi nam dane wejsciowe wzgledem separatora
			$login = $data[0];   // elementy w tablicy [login,haslo]
			if ($login == $_POST["nazwa_uzytkownika"]) { //sprawdzenie czy wpisany login pasuje do któregos z pliku info
				//pobranie hasla a nastepnie sprawdzenie czy pasuje do loginu
//[zad s2.2]
				$password = $data[1];  // elementy w tablicy [login,haslo]
				if ($login == $_POST["nazwa_uzytkownika"] && $password == md5($_POST["haslo"])) { //przyrownanie z loginem
					//częsc z czasem 
					//funckcja substr($zmienna, 0, $ile) – obcina znaki w $zmienna, $x = substr("abcdef", 2, -1);  zwróci "cde" itd
					//zapisanie daty w odpowiednim stringu
//[zad s2.4] - początek
					$data = substr($_POST["data"], 0, 4).substr($_POST["data"], 5, 2).substr($_POST["data"], 8, 2).substr($_POST["godzina"], 0, 2).substr($_POST["godzina"], 3, 2).date('s'); 
					//utworzy nam stringa RRRRMMDDggmmss 
					
					// Szukanie istniejacych wpisow stworzonych w tym samym czasie
					$katalog = scandir($blog); //Zwraca tablicę z wszystkimi plikami i katalogami znajdującymi się w blog
					$match = "";
					$regularne = '/^'.preg_quote($data, '/').'[0-9][0-9]$/';	//Cytuje znaki wyrażeń regularnych
					//stworzy nam /^RRRRMMDDggmmss[0-9][0-9]$/
					
					foreach ($katalog as &$wartosc) { // przepisanie do stringa nazw znalezionych wpisow
						if (preg_match($regularne, $wartosc)) { $match .= $wartosc." "; } 	//preg_match zwraca ile razy dopasowano wzór
					}
					
					// Jesli nie ma takich wpisow to dodajemy nowy z numerem unikalnym numerem
					if (empty($match)) {
						$nowy = $data."00"; //dodajemy do stringa UU=(00) RRRRMMDDggmmssUU 
					} else {
						$matches = explode(" ", $match); // Jesli sa takie pliki to dodajemy nowe z odpowiednia nazwa
						$licznik = (count($matches)) - 1; // odejmujemy 1, bo po wykonaniu explode() otrzymujemy tablice z jednym pustym elementem na koncu
						if (($licznik) < 10) { 
							$nowy = $data."0".$licznik;
						} else {
							$nowy = $data.$licznik;
						}
					}
					$nowy_post = fopen($blog."/".$nowy, "w"); // utworzenie pliku wpisu
					fwrite($nowy_post, $_POST["wpis"]);
					fclose($nowy_post);
//[zad s2.4] - koniec	
	
//[zad s2.5] 
					// Wczytywanie plików
					for ($i = 1; $i <= count($_FILES); $i++) {
						$plik = basename($_FILES['plik'.$i]['name']);
						if ($plik != "") { 
							$sciezka = pathinfo($plik); //pobranie sciezki
							move_uploaded_file($_FILES['plik'.$i]['tmp_name'], $blog."/".$nowy.$i.".".$sciezka['extension']);
						}
					}
					// Wczytywanie plików
				/*	$plik1 = basename($_FILES['plik1']['name']);
					$plik2 = basename($_FILES['plik2']['name']);
					$plik3 = basename($_FILES['plik3']['name']);
					if ($plik1 != "") { 
						$sciezka = pathinfo($plik1); //pobranie sciezki
						move_uploaded_file($_FILES['plik1']['tmp_name'], $blog."/".$nowy."1.".$sciezka['extension']);
					}
					if ($plik2 != "") {
						$sciezka = pathinfo($plik2); //pobranie sciezki
						move_uploaded_file($_FILES['plik2']['tmp_name'], $blog."/".$nowy."2.".$sciezka['extension']);
					}
					if ($plik3 != "") {
						$sciezka = pathinfo($plik3); //pobranie sciezki
						move_uploaded_file($_FILES['plik3']['tmp_name'], $blog."/".$nowy."3.".$sciezka['extension']);
					}*/
				}else{
					header("Location: blog_post.php?blad=blad_logowania");//przekierowuje nas do strony wyjsciowej z bledem
					exit();
				}
				break; //wychodzi po zakonczeniu wpisu
			}else{
				$iterator++;  //do petli gdy szuka czy blog istnieje
			}
			if ($iterator == $liczba_katalogow) { //gdy przeiterowalismy cala kartoteke
				header("Location: blog_post.php?blad=blad_logowania"); //przekierowuje nas do strony wyjsciowej z bledem
				exit();
			}
		
		}
		header("Location: blog.php?nazwa=$blog"); //gdy uda nam się utworzyć blog przekierowuje nas na jego adres
	
	?>
	

	</body>
</html>
