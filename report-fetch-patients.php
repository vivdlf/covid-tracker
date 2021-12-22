<?php
/* 
Written by: Juan Sarabia
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
require_once "config.php";

$output = '';

if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($mysqli, $_POST["query"]);
 $query = "
  SELECT * FROM general_user_information 
  WHERE id LIKE '%".$search."%'
  OR firstName LIKE '%".$search."%' 
  OR lastName LIKE '%".$search."%' 
  
 ";
}
else
{
 $query = "
  SELECT * FROM general_user_information ORDER BY id LIMIT 5
 ";
}
$result = mysqli_query($mysqli, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr >
     <th> USER ID</th>
     <th> FIRST NAME</th>
     <th> LAST NAME</th>
     <th> ACTION </th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["firstName"].'</td>
    <td>'.$row["lastName"].'</td>
    <td><button type="button" id="'.$row["id"].'" onclick="makeReport(event)" class="btn btn-success report_item">Generate Report</button> </td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo '<div style="display: flex; position: relative; top: 20px; justify-content: center;" >No search results. </div>';
}

?>