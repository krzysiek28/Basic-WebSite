<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Przeglądanie bloga</title>
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	</head>
	<body style="background-color: #42adf4">
	
																		<!--[zad s1]-->
																		
	<?php

		$nazwa_blogu = $_POST["nazwa_blogu"]; // pobranie nazwy blogu
		
//[zad s1.1]
		//$S=sem_get(1,2,3);
		//sem_acquire($S);
		if (!is_dir($nazwa_blogu)) {	 // Sprawdzenie czy blog istnieje, jesli nie to utworzenie go i wpisanie odpowiednich danych do pliku info
			mkdir($nazwa_blogu, 0755, true); //nazwa sciezki, prawa dostepu, rezultat 	
//[zad s1.2]
			$info = fopen($nazwa_blogu."/info", "w"); //otwarcie pliku info do zapisu
			$nazwa_uzytkownika = $_POST['nazwa_uzytkownika']."\n"; //wczytanie nazwy uzytkownika z formularza zakonczone znakiem konca lini
//[zad s1.3]		
			fwrite($info, $nazwa_uzytkownika);	//wpisanie do pliku info nazwy uzytkownika
			$haslo = $_POST['haslo']; // pobranie hasla
//[zad s1.4]
			$password = md5($haslo); // zakodowanie md5 hasla, uniewidacznianie hasla
			fwrite($info, $password."\n"); //wpisanie hasla z znakiem konca linii
//[zad s1.5] -> new_blog.php <textarea...
			fwrite($info, $_POST["opis_blogu"]); //wpisanie opisu blogu
			fclose($info); //zamkniecie pliku info
			chmod($nazwa_blogu."/info", 0755); // ustawienie jeszcze raz odpowiednich praw dostepu
			header("Location: blog.php?nazwa=$nazwa_blogu"); // przekierowanie do strony bloga
		}
		else {
			header("Location: new_blog.php?blad=istnieje"); // Jesli blog o podanej nazwie istnieje to przekierowanie na odpowiednia strone z adnotacja
			exit();
		}

		//sem_release($S);
		
		
		
	?>
	

	</body>
</html>
