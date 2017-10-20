<?php
//done
class FileUploadRequest
{
	private $fileUploadArray;
	const UPLOAD_PATH = './uploads/';
	
	public function __construct(array $fileUploadArray)
	{
		$this->fileUploadArray = $fileUploadArray;
	}
	
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

	public function getUploadPath()
	{
		return self::UPLOAD_PATH;
	}
}

?>