<?php

class HTMLTable extends Page
{
   
   public function get()
   {
    // I might need to change this .. 
     $table = '<table>';
     $table .= '<tr><td> test </td></tr>';
     $table .= '</table> ';
     $this->html .= $table;
   }
   
   public function post()
   {
	   $this->html .= '<h1>Nothing to see here folks!</h1>';
   }

}

?>