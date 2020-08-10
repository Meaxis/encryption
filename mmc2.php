<?php
	include 'conversiontable.inc';

	if (isset($_POST['tmode']) && $_POST['tmode'] == "tonormal" && isset($_POST['text']))
	{
		$query = $bdd->prepare('SELECT * FROM gataouTranslate');
		$query->execute();

		$increment = 0;
		$text = $_POST['text'];

		foreach(range('A','Z') as $lettre) 
		{
			$increment++;
			$text = str_replace($lettre, "{".$increment."}", $text);   
		}

		foreach(range('a','z') as $lettre) 
		{
			$increment++;
			$text = str_replace($lettre, "{".$increment."}", $text);   
		}

		foreach ($conversiontable as $key => $value) {
			$text = str_replace($key, $value, $text);
		}

		$text = strrev($text);

		echo "<h2>Result:</h2><br><code>".$text."</code>";
	}

	elseif (isset($_POST['tmode']) && $_POST['tmode'] == "tocipher" && isset($_POST['text']))
	{
		$text = $_POST['text'];
		$text = strrev($text);
		$increment = 0;
		foreach(range('N','Z') as $lettre) 
		{
			$increment++;
			$text = str_replace($lettre, "{".$increment."}", $text);   
		}

		foreach(range('A','M') as $lettre) 
		{
			$increment++;
			$text = str_replace($lettre, "{".$increment."}", $text);   
		}

		foreach(range('n','z') as $lettre) 
		{
			$increment++;
			$text = str_replace($lettre, "{".$increment."}", $text);   
		}

		foreach(range('a','m') as $lettre) 
		{
			$increment++;
			$text = str_replace($lettre, "{".$increment."}", $text);   
		}

		$increment = 0;

		foreach(range('A','Z') as $lettre) 
		{
			$increment++;
			$text = str_replace("{".$increment."}", $lettre, $text);   
		}

		foreach(range('a','z') as $lettre) 
		{
			$increment++;
			$text = str_replace("{".$increment."}", $lettre, $text);   
		}

		echo "<h2>Result:</h2><br><code>".$text."</code>";
	}

?>
