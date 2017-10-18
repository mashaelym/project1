<?php
class Request
{
	private $httpRequest;
	private $fileUploadRequest;
	

	public function setHTTPRequest($httpRequest)
	{
		$this->httpRequest = new HTTPRequest($httpRequest);
	}
	
	public function setFileUploadRequest($fileUploadRequest)
	{
		$this->fileUploadRequest = new FileUploadRequest($fileUploadRequest);
	}
	
}

?>