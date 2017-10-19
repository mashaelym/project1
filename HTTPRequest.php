<?php

class HTTPRequest
{
	private $httpRequestArray;
	
	public function __construct(array $httpRequestArray)
	{
		$this->httpRequestArray = $httpRequestArray;
	}
	
	public function getParameter($httpParamName)
	{
		if(array_key_exists($httpParamName, $this->httpRequestArray))
		{
			return $this->httpRequestArray[$httpParamName];
		}
		
	}
}
	
?>