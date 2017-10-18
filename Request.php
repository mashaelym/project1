<?php

/**
Creating a class called Request to encapsulate post/get/file
data coming from the web that will be available to all the page
classes. I want to encapsulate my globals so they are always hidden 
and we know exacttly what data we are using
**/
class Request
{
	private $httpRequest;
	private $fileUploadRequest;
	
    /**
	 * input: $_REQUEST global
	 */
	public function setHTTPRequest($httpRequest)
	{
		$this->httpRequest = new HTTPRequest($httpRequest);
	}
	
    /**
	 * input: $_FILES global
	 */
	public function setFileUploadRequest($fileUploadRequest)
	{
		$this->fileUploadRequest = new FileUploadRequest($fileUploadRequest);
	}
	
	public function getHTTPRequest()
	{
		return $this->httpRequest;
	}
	
    /**
	 * ouput: FileUploadRequest
	 */
	public function getFileUploadRequest()
	{
		return $this->fileUploadRequest;
	}
}

?>