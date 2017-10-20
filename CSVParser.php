<?php
//done
class CSVParser
{  
	  public static function parseCSV($OriginalFileName)
	  {

	  	$lines=array();
		$file = fopen($OriginalFileName, 'r');
		while (($line = fgetcsv($file)) !== FALSE) 
		{
			$lines[]=$line;
		}
		fclose($file);
		
		return $lines; //return an array
	  }	
}


?>