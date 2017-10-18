<?php

class FileUploader 
{
  private $fileUploadRequest;
  
   /*
    * I created this as a constant so we are not repeating this everywhere, thus reducing lines of code and not repeating ourselves. 
    */
  const UPLOAD_PATH = './uploads/';
  
  public function __construct(FileUploadRequest $fileUploadRequest)
  {
    $this->fileUploadRequest = $fileUploadRequest;
  }
  
  public function moveFile() 
  {
     
    $tempFileName = $this->fileUploadRequest->getTempFileName();
    $originalFileName = $this->fileUploadRequest->getOriginalFileName();

	if($this->doesFileExist() == true)
	{
		$this->deleteFile();
	}
	
    move_uploaded_file($tempFileName, self::UPLOAD_PATH . $originalFileName);
	
	//Note to self: should I put error handling in here if it doesn't move? 

   }
   // a function to check if the file exists when we are trying to load a file
   // returns a boolean TRUE: if file exists. False: if file does not exist.
   // I stored it in a different function to seperate responsibilities and not use two built in functions in one method.
  private function doesFileExist()
  {
      $originalFileName = $this->fileUploadRequest->getOriginalFileName();
	  return file_exists(self::UPLOAD_PATH . $originalFileName);
  }
  // function to delete the file 
  private function deleteFile()
  {
	  unlink(self::UPLOAD_PATH . $originalFileName);
  }
  
}

?>