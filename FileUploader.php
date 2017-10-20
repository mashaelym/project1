<?php
//done
class FileUploader 
{
  private $fileUploadRequest;
  private $originalFileName;
  private $uploadPath;

  public function __construct(FileUploadRequest $fileUploadRequest)
  {
    $this->fileUploadRequest = $fileUploadRequest;
    $this->originalFileName = $this->fileUploadRequest->getOriginalFileName();
    $this->uploadPath= $this->fileUploadRequest->getUploadPath();
  }
  
  public function moveFile() 
  {
     
    $tempFileName = $this->fileUploadRequest->getTempFileName();
   

	if($this->doesFileExist() == true)
	{
		$this->deleteFile();
	}
	
    move_uploaded_file($tempFileName, $this->uploadPath . $this->originalFileName);

   }
   // a function to check if the file exists when we are trying to load a file
   // returns a boolean TRUE: if file exists. False: if file does not exist.
   // I stored it in a different function to seperate responsibilities and not use two built in functions in one method.
  private function doesFileExist()
  {
	  return file_exists($this->uploadPath . $this->originalFileName);
  }
  // function to delete the file 
  private function deleteFile()
  {
	  unlink($this->uploadPath . $this->originalFileName);
  }
  
}

?>