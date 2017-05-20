<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Dodawanie komentarza</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
</head>
<body>
																		<!--[zad s3]-->
<?php
		$url = urldecode($_SERVER['HTTP_REFERER']); // Pobranie URLa ze strony wpisu (zawiera on nazwe blogu i wpisu)
		$url_split = explode("?", $url); // Wyciagniecie z URLa nazwy bloga i wpisu
		$count_url = count($url_split);
		if ($count_url == 2) {
			$data_split = explode("/", $url_split[$count_url - 1]);
			$blog = $data_split[count($data_split) - 2];
			$wpis = $data_split[count($data_split) - 1];
		} else {
			$blog = $url_split[1]."?";
			for ($i = 2; $i < ($count_url - 1); $i++) {
				$blog .= $url_split[$i]."?";
			}
			$wpis_split = explode("/", $url_split[$count_url - 1]);
			$blog .= $wpis_split[0];
			$wpis = $wpis_split[1];
		}
//[zad s3.1]
		$path = $blog."/".$wpis.".k"; // Okreslenie nazwy katalogu dla komentarzy
		if (!is_dir($path)) { // Jesli nie ma katalogu z komentarzami to tworzymy go
			mkdir($path, 0755, true);
		}
		$all_files = scandir($path); // Pobranie zawartosci katalogu komentarzy
		$files = array_diff($all_files, array('.', '..')); // Usuniecie z tablicy elementow '.' i '..'
//[zad s3.2]
		$count_files = count($files); // Policzenie istniejacych komentarzy
		$kom = fopen($path."/".$count_files, "w"); // Stworzenie pliku komentarza
		$czas = date('Y-m-d, H:i:s'); // Pobranie czasu z serwera

//[zad 3.3]
		fwrite($kom, "Rodzaj: ".$_POST["rodzaj"]."\n"."Dodany: ".$czas."\n"."Komentujący: ".$_POST["pseudonim"]."\n"."Treść: ".$_POST["komentarz"]);
		fclose($kom); // Wpisanie i zamkniecie pliku

		header("Location: blog.php?nazwa=$blog"); // Powrot do strony bloga
?>
</body>
</html>