<?php
	include 'conversiontable.inc';

	if (isset($_POST['tmode']) && $_POST['tmode'] == "tonormal" && isset($_POST['text']))
	{
		$increment = 0;
		$text = $_POST['text'];

		foreach(range('A','Z') as $letter) 
		{
			$increment++;
			$text = str_replace($letter, "{".$increment."}", $text);   
		}

		foreach(range('a','z') as $letter) 
		{
			$increment++;
			$text = str_replace($letter, "{".$increment."}", $text);   
		}

		foreach ($conversiontable as $key => $value) {
			$text = str_replace($key, $value, $text);
		}

		echo "<h2>Result:</h2><br><code>".$text."</code>";
	}

	elseif (isset($_POST['tmode']) && $_POST['tmode'] == "tocipher" && isset($_POST['text']))
	{
		$text = $_POST['text'];
		$increment = 0;
		foreach(range('N','Z') as $letter) 
		{
			$increment++;
			$text = str_replace($letter, "{".$increment."}", $text);   
		}

		foreach(range('A','M') as $letter) 
		{
			$increment++;
			$text = str_replace($letter, "{".$increment."}", $text);   
		}

		foreach(range('n','z') as $letter) 
		{
			$increment++;
			$text = str_replace($letter, "{".$increment."}", $text);   
		}

		foreach(range('a','m') as $letter) 
		{
			$increment++;
			$text = str_replace($letter, "{".$increment."}", $text);   
		}

		$increment = 0;

		foreach(range('A','Z') as $letter) 
		{
			$increment++;
			$text = str_replace("{".$increment."}", $letter, $text);   
		}

		foreach(range('a','z') as $letter) 
		{
			$increment++;
			$text = str_replace("{".$increment."}", $letter, $text);   
		}

		echo "<h2>Result:</h2><br><code>".$text."</code>";
	}

?>
