<?php

class FileUploadRequest
{
	private $fileUploadArray;
	
	public function __construct(array $fileUploadArray)
	{
		$this->fileUploadArray = $fileUploadArray;
	}
	
	//Note to self: refactor to make it work with any file input name
	// to get the original name
	public function getOriginalFileName()
	{
		return $this->fileUploadArray['fileToUpload']['name'];
	}
    // to get the temporary name of the file 
	public function getTempFileName()
	{
		return $this->fileUploadArray['fileToUpload']['tmp_name'];
	}
    // to get the file type 
	public function getFileType()
	{
		return $this->fileUploadArray['fileToUpload']['type'];
	}
}

?>