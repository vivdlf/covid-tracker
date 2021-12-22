<?php
/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
require_once "permissions.php";

// Include config file
require_once "config.php";

if(!isset($_POST['first_name']) && empty($_POST['first_name']))
{    
    if($_SESSION["profile_completed"] != true)
    {            
        header("location: new-user-form.php");//redirect to new-user-form to complete user profile  
        //NOTE TO SELF ABOUT CALLING FUNCTION EXIT AFTER A REDIRECT!!!!!!!!!!!!!!!!!!!
        exit; //MAKE SURE TO CALL EXIT; OTHERWISE A REDIRECT HEADER WILL NOT STOP AN EXISTING SCRIPT FROM EXECUTING 
        //THE REDIRECT HAPPENS ***AFTER*** THE ENTIRE PAGE HAS EXECUTED.      
    }
    
}

// Escape user inputs for security
$first_name = mysqli_real_escape_string($mysqli, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($mysqli, $_REQUEST['last_name']);
$gender = mysqli_real_escape_string($mysqli, $_REQUEST['gender']);
$dateOfBirth = mysqli_real_escape_string($mysqli, $_REQUEST['dateOfBirth']);
$address_street = mysqli_real_escape_string($mysqli, $_REQUEST['address_street']);
$address_number = mysqli_real_escape_string($mysqli, $_REQUEST['address_number']);
$address_city = mysqli_real_escape_string($mysqli, $_REQUEST['address_city']);
$address_district = mysqli_real_escape_string($mysqli, $_REQUEST['address_district']);
$email = mysqli_real_escape_string($mysqli, $_REQUEST['email']);


//need to get the current user's ID from Session array

$id = $_SESSION["id"];
//need to concat first_name, last_name and dateOfBirth to create qrCodeId

$qrCodeId = $first_name. $last_name. $dateOfBirth;

//echo ($qrCodeId);
//$_SESSION["qrCodeId"] = $qrCodeId;

// attempt insert query execution
$sql = "INSERT INTO general_user_information(
    id,
    firstName,
    lastName,
    dateOfBirth,
    gender,
    address_street,
    address_district,
    address_city,
    address_number,
    email,
    qrCodeId
)
VALUES(
    '$id',
    '$first_name',
    '$last_name',
    '$dateOfBirth',
    '$gender',
    '$address_street',
    '$address_district',
    '$address_city',
    '$address_number',
    '$email',
    '$qrCodeId'
)";
//INSERT INTO general_user_information (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
if(mysqli_query($mysqli, $sql)){
    echo nl2br("\nRecords added successfully to general_user_information table.");
    $_SESSION["qrCodeId"] = $qrCodeId; //store the current user's newly created QR code in the session array
    $_SESSION["profile_completed"] = true; //update the session array's profile_completed bool to true to indicate profile creation    
    header("location: qr-code-create.php");
} else{
    echo nl2br("\nERROR: Failed to execute $sql. " . mysqli_error($mysqli));
}
 
// close connection
mysqli_close($mysqli);

?>