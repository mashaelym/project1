<?php

ini_set('file_uploads', 'On');
ini_set('post_max_size', '100M');
ini_set('upload_max_filesize', '100M');
ini_set('display_errors', 'On');
error_reporting(E_ALL);

class Manage {
    public static function autoload($class) {
        include $class . '.php';
    }
}

spl_autoload_register(array('Manage', 'autoload'));

$obj = new main();
class main
{
    public function __construct()
    {
	$pageRequest = 'UploadForm';
        if(isset($_REQUEST['page'])) {
            $pageRequest = $_REQUEST['page'];
        }
				
		$request = new Request();
		$request->setHTTPRequest($_REQUEST);
		$request->setfileUploadRequest($_FILES);
		$page = new $pageRequest;
		$page->setRequest($request);
          
        if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
            $page->get();
        } 
		else
		{
	    	$page->post();
        }
    }

}

?>
