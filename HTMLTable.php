<?php
//done

class HTMLTable extends Page
{
  
   public function get()
   {
     $request     = new Request();
     $FileName = $this->getRequest()->getHTTPRequest()->getParameter('filename');
     $parse       = new CSVParser('./uploads/' . $FileName);
     $table       = '<table>';
     $table      .= '<tr><td> test </td></tr>';
     $table      .= '</table> ';
     $this->html .= $table;
     $this->html .=$parse;
   }
   
   public function post()
   {
	   $this->html .= '<h1>Nothing to see here folks!</h1>';
   }

}

?>