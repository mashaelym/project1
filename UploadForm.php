<?php

class UploadForm extends Page
{

    public function get()
    {
        $form = '<form action="index.php?page=UploadForm" method="post" enctype="multipart/form-data">';
        $form .= '<input type="file" name="fileToUpload" id="fileToUpload"/>';
        $form .= '<input type="submit" value="Upload File" name="submit"/>';
        $form .= '</form> ';
        $this->html .= '<h1>Upload Form</h1>';
        $this->html .= $form;
    }

   public function post()
   {   

   }

}

?>