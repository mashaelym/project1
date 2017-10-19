<?php

class CSVParser
{
private $OriginalFileName;
public function __construct(FileUploadRequest $OriginalFileName)
{
	$this->OriginalFileName = $OriginalFileName;
	$OriginalFileName = $this->OriginalFileName->getOriginalFileName();
}
  
	  public function parseCSV()
	  {
		$file = fopen($this->$OriginalFileName, 'r');
		while (($line = fgetcsv($file)) !== FALSE) 
		{
			$r=print_r($line); // put  into an array
		}
		fclose($file);
		
		return $r; //return an array
	  }	
}


?>