<?php

/**
 Base class for my page class
**/
abstract class Page 
{
    
    protected $html;
    
    /**
        store request object access by all page object subtypes
    **/
    protected $request;
    
    public function __construct()
    {
        $this->html .= '<html>';
        $this->html .= '<link rel="stylesheet" href="styles.css">';
        $this->html .= '<body>';
    }
    public function __destruct()
    {
        $this->html .= '</body></html>';
        stringFunctions::printThis($this->html);
    }
    
    public function setRequest(Request $request)
    {       
        $this->request = $request;
    }
    
    public function getRequest()
    {
        return $this->request;
    }

   
    /**
        these are abstract protected to force all
        extending classes to define these methods
    **/
    abstract public function get();
    abstract public function post();
}

?>
