 <?php

class ArrayToTable
{
  
  public static function generate(array $inputArray)
  {
    //logic ---> this returns an HTML string with a table in it.
    //HTML table should use the table head tag for the first row of the table and have the field names from the CSV file in this row. 
    $tableString = '<table>';
    $headerString = '<thead><tr>';

    foreach ($inputArray[0] as $columnName)
    {
      $headerString.="<td>$columnName</td>";
    }

    $headerString.='</thead></tr>';

    for ($i=1 ; $i<=sizeof($inputArray)-1 ; $i++)
    {
        $currentArray = $inputArray[$i];  

        if (sizeof($currentArray)==sizeof($inputArray[0]))
        {
          print_r($currentArray);
        }
    }
    
  }
  
}
?>