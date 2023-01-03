<?php 

function convertToSEO($text)
{
	//URL converto svenska chracter
	$svenska = array("å", "Å", "ö", "Ö", "ä", "Ä");
	$convert = array("a", "A", "o", "O", "e", "E");
	
	return strtolower(str_replace($svenska, $convert, $text)); 
}

?>