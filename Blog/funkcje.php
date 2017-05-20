<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Dodawanie komentarza</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
</head>
<body>

<?php

//[zad 5]
	function menu() {
		echo " 
		<div>
			<ul>
				<li style=\"display: inline; list-style-type: none; padding-right: 30px;\">
					<a href=\"index.php\">Strona główna</a>				
				</li>
				<li style=\"display: inline; list-style-type: none; padding-right: 30px;\">
					<a href=\"new_blog.php\">Stwórz blog</a>				
				</li>
				<li style=\"display: inline; list-style-type: none; padding-right: 30px;\">
					<a href=\"blog_post.php\">Dodaj wpis do bloga</a>				
				</li>
				<li style=\"display: inline; list-style-type: none; padding-right: 30px;\">
					<a href=\"blog.php\">Lista blogów</a>				
				</li>
				<li style=\"display: inline; list-style-type: none; padding-right: 30px;\">
					<a href=\"chatter.php\">Chat</a>				
				</li>
			</ul>
			
		</div> 
		";
	}
	
	function blad_tworzenia(){
		echo "
			<strong style=\"color: red\">Ta nazwa blogu jest już zajęta</strong>
		";
	}
		
	function blad_tworzenia2(){
			echo "
				<strong style=\"color: red\">Ten login jest już zajęty</strong>
			";		
	}
	function blad_logowania(){
			echo "
				<strong style=\"color: red\">Nieprawidłowy login lub hasło</strong>
			";		
		}	
	
?>
</body>
</html>
