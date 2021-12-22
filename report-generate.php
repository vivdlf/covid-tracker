<?php
/* 
Written by: Juan Sarabia & Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
Algorithm by: Viviannie De La Fuente
*/
require_once "config.php";
function generatereport($mysqli){
  $conn = $mysqli;
    $query = $_POST['query'];
    $output = '';
    $query = htmlspecialchars($query);

// This query selects the close contacts to a patients that has been positive. the patients selected are 15 days prior to date tested
$sql1 ="SELECT DISTINCT S.logDate, B.business_name AS businessName, S.id, G.firstName, G.lastName, G.email
        FROM scan_logs AS S
        INNER JOIN general_user_information AS G
        ON S.id = G.id
        INNER JOIN business_information AS B 
        ON B.businessId = S.businessId 
        WHERE B.businessId in ( 
          SELECT businessId 
          FROM scan_logs
          WHERE id = ".$query."
          GROUP BY id
        )
        AND S.id != ".$query." AND S.logDate in(
          SELECT  logDate 
	        FROM scan_logs
	        WHERE id = ".$query."
	        GROUP BY id)
        AND S.logDate BETWEEN (SELECT dateOfDiagnosis 
                               FROM diagnosis
                               WHERE id = 29 AND diagnosis = 'Positive'
                               ORDER BY dateOfDiagnosis LIMIT 1) - INTERVAL +14 DAY 
                     AND (Select dateOfDiagnosis 
                          FROM diagnosis
                          WHERE id = ".$query." AND diagnosis = 'Positive'
                          ORDER BY dateOfDiagnosis LIMIT 1)
        ORDER BY S.logDate;" ;

echo "<br>";
 //generate the table of the close contacts to be displayed in the index file and also to be downloaded
$results = mysqli_query($conn,$sql1);
    if(!$results)
        die("No close contact.");
        $rows = mysqli_num_rows($results);
    
    if($rows){
         $output .= '
          <div class="table-responsive">
           <table id="report" class=" t table table bordered">
            <tr >
             <th> USER ID</th>
             <th> LOG DATE</th>
             <th> BUSINESS NAME</th>
             <th> FIRST NAME</th>
             <th> LAST NAME</th>
             <th> EMAIL</th>
            </tr>
         ';
       while($row = mysqli_fetch_array($results))
         {
          $output .= '
           <tr class="row">
            <td>'.$row["id"].'</td>
            <td>'.$row["logDate"].'</td>
            <td>'.$row["businessName"].'</td>
            <td>'.$row["firstName"].'</td>
            <td>'.$row["lastName"].'</td>
            <td>'.$row["email"].'</td>
           </tr>
          ';
         }
  echo $output;
    }
}

generatereport($mysqli)


?>