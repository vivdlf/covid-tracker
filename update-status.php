<?php
/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
//require_once "permissions.php";

// Include config file
require_once "config.php";

if(!isset($_GET['id']) && empty(_GET['id']))
{    
            
        header("location: welcome.php");//redirect to welcome page if missing id of diagnosed person
        //NOTE TO SELF ABOUT CALLING FUNCTION EXIT AFTER A REDIRECT!!!!!!!!!!!!!!!!!!!
        exit; //MAKE SURE TO CALL EXIT; OTHERWISE A REDIRECT HEADER WILL NOT STOP AN EXISTING SCRIPT FROM EXECUTING 
        //THE REDIRECT HAPPENS ***AFTER*** THE ENTIRE PAGE HAS EXECUTED.         
    
}

// Escape user inputs for security
$diagnosis = "Positive";
$diagnosisDate = mysqli_real_escape_string($mysqli, $_REQUEST['diagnosisDate']);
$comment = mysqli_real_escape_string($mysqli, $_REQUEST['comment']);
$id = mysqli_real_escape_string($mysqli, $_REQUEST['id']);

// attempt insert query execution
$sql = "INSERT INTO diagnosis(    
    diagnosis,
    dateOfDiagnosis,
    comment,
    id
)
VALUES(    
    '$diagnosis',
    '$diagnosisDate',
    '$comment',
    '$id'
)";


if(mysqli_query($mysqli, $sql)){
    echo nl2br("\nRecords added successfully to diagnosis table.");
    
    header("location: diagnosis-create.php");
} else{
    echo nl2br("\nERROR: Failed to execute $sql. " . mysqli_error($mysqli));
}
 
// close connection
mysqli_close($mysqli);

?>