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

class main {

    public function __construct()
    {
        //if no page is set then load the home page by default
	$pageRequest = 'uploadFormHomePage';
        if(isset($_REQUEST['page'])) {
            $pageRequest = $_REQUEST['page'];
        }
         $page = new $pageRequest;

          
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $page->get();
        } 
	else {

//	        if(isset($_REQUEST['submit']))
//		{
		$fileUploadData=new FileUploadData($_FILES);
		$page->post($fileUploadData);
//		}

//	    $page->post();
        }
    }

}

abstract class page {
    protected $html;

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

    public function get() {
        echo 'default get message';
    }

   // public function post() {
     //   print_r($_POST);
//    }
}

//class homepage extends page {

//    public function get() {

//        $form = '<form action="index2.php" method="post">';
//        $form .= 'First name:<br>';
//        $form .= '<input type="text" name="firstname" value="Mickey">';
//        $form .= '<br>';
  //      $form .= 'Last name:<br>';
    //    $form .= '<input type="text" name="lastname" value="Mouse">';
      //  $form .= '<input type="submit" value="Submit">';
//        $form .= '</form> ';
//        $this->html .= 'homepage';
//        $this->html .= $form;
//    }

//}
class uploadFormHomePage extends page
{

    public function get()
    {
        $form = '<form action="index.php?page=uploadFormHomePage" method="post" enctype="multipart/form-data">';
        $form .= '<input type="file" name="fileToUpload" id="fileToUpload"/>';
        $form .= '<input type="submit" value="Upload File" name="submit"/>';
        $form .= '</form> ';
        $this->html .= '<h1>Upload Form</h1>';
        $this->html .= $form;

    }

   public function post($fileUploadData) {

      $fileUploader= new FileUploader($fileUploadData);
      $fileUploader->moveFile();
      $fileUploader->redirect();
    }
}

class FileUploader 
{
  private $fileUploadData;
  public function __construct( $fileUploadData)
  {
    $this->fileUploadData= $fileUploadData;
  }

  public function moveFile() 
  {
     
    $uploads_dir = './uploads';
    $tmp_name =$this->fileUploadData->getTempFileName();
    $originalFileName=$this->fileUploadData->getOriginalFileName();

    move_uploaded_file($tmp_name, $uploads_dir . '/' . $originalFileName);

   }
  
  public function redirect()
  {
    
    header('Location: index.php?page=htmlTable&filename=project1');
   


  }

  private function deleteExistingFile()
  {
  // Check if file already exists
 	 if (file_exists($target_file)) {
  
  	}
  }
}

class FileUploadData
{
private $fileUploadArray;
	public function __construct(array $fileUploadArray)
	{
	$this->fileUploadArray= $fileUploadArray;
	}

	public function getOriginalFileName()
	{
	 return $this->fileUploadArray['fileToUpload']['name'];
	}

	public function getTempFileName()
	{
	 return $this->fileUploadArray['fileToUpload']['tmp_name'];

	}

	public function getFileType()
	{
	 return $this->fileUploadArray['fileToUpload']['type'];

	}

}

class csvParser
{

  public function parseCSV()
  {

  }



}

class htmlTable extends page
{
   
   public function get()
   {
     $table = '<table>';
     $table .= '<tr><td> test </td></tr>';
     $table .= '</table> ';
     $this->html .= '<h1>CSV Output</h1>';
     $this->html .= $table;


   }

}

?>
