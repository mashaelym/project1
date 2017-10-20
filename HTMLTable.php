<?php
//done

class HTMLTable extends Page
{
   
   public function get()
   {
     $request     = new Request();
     $FileName    = $this->getRequest()->getHTTPRequest()->getParameter('filename');
     $uploadPath = $this->getRequest()->getFileUploadRequest()->getUploadPath();
     $parse       = CSVParser::parseCSV($uploadPath  . $FileName);
     $tableHtmlOutput = ArrayToTable::generate($parse);
   
     $this->html .=$tableHtmlOutput;
   }
   
  public function post()
   {
     $this->html .= '<h1>Nothing to see here folks!</h1>';
   }
}

?>