<?php
/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
require_once "permissions.php";

// Include config file
require_once "config.php";

if(!isset($_POST['business_name']) && empty($_POST['business_name']))
{
    
    if($_SESSION["profile_completed"] != true)
    {
        header("location: new-business-form.php");//redirect to new-business-form to complete user profile  
        exit; //NOTE TO SELF!!!!!!make sure to call function exit otherwise the remaining script in the page will continue executing
        //a redirect only happens AFTER all the entire page has finished executing its script.  An exit will terminate
        //all remaining script execution.
    }
}
else
{// Escape user inputs for security
$business_name = mysqli_real_escape_string($mysqli, $_REQUEST['business_name']);
$address_street = mysqli_real_escape_string($mysqli, $_REQUEST['address_street']);
$address_number = mysqli_real_escape_string($mysqli, $_REQUEST['address_number']);
$address_city = mysqli_real_escape_string($mysqli, $_REQUEST['address_city']);
$address_district = mysqli_real_escape_string($mysqli, $_REQUEST['address_district']);
$email = mysqli_real_escape_string($mysqli, $_REQUEST['email']);


//need to get the current user's ID from Session array

$id = $_SESSION["id"];

// attempt insert query execution
$sql = "INSERT INTO business_information(       
    businessId,             
    business_name,    
    address_street,
    address_district,
    address_city,
    address_number,
    email
)
VALUES(
    '$id', /* current user id will be linked to business acount id.  A business requires a user account to exist first*/    
    '$business_name',    
    '$address_street',
    '$address_district',
    '$address_city',
    '$address_number',
    '$email'   
)";

if(mysqli_query($mysqli, $sql)){
    echo nl2br("\nRecords added successfully to business_information table.");
    $_SESSION["profile_completed"] = true; //update the session array's profile_completed bool to true to indicate profile creation    
    header("location: welcome.php");
} else{
    echo nl2br("\nERROR: Failed to execute $sql. " . mysqli_error($mysqli));
}
 
// close connection
mysqli_close($mysqli);
}
?>