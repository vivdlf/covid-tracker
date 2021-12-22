<?php
/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
session_start();


if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { //if user is not logged in
    header("location: login.php"); //redirect to login page
    exit;
} else { //user is logged in

    //initializing 4 arrays with webpage names accessible by each accounttype
    $generalUser_webpage_array = array(
        "register.php",
        "login.php",
        "reset-password.php",
        "logout.php",
        "welcome.php",
        "new-user-form.php",
        "new-user-save.php",
        "learn-more.php",
        "tips.php",
        "qr-code-create.php",
        "qr-code-save.php",
        
    );

    $businessUser_webpage_array = array(
        "register.php",
        "login.php",
        "reset-password.php",
        "logout.php",
        "welcome.php",
        "new-business-form.php",
        "new-business-save.php",
        "learn-more.php",
        "tips.php",
        "scan.php"
    );

    $healthcareProfessional_webpage_array = array(
        "register.php",
        "login.php",
        "welcome.php",
        "reset-password.php",
        "logout.php",
        "learn-more.php",
        "tips.php",
        "send-notification.php",
        "send-email.php",
        "blank.php",
        "report.php",
        "diagnosis-create.php"
    );

    $admin_webpage_array = array(
        "register.php",
        "login.php",
        "welcome.php",
        "reset-password.php",
        "learn-more.php",
        "tips.php",
        "logout.php"
    );

    define('ADMIN_ACCT_TYPE', 1);       //Admin User = account type 1
    define('GENERAL_ACCT_TYPE', 2);     //General User = account type 2   
    define('HEALTHCARE_ACCT_TYPE', 3);  //Healthcare User = account type 3
    define('BUSINESS_ACCT_TYPE', 4);    //Business User = account type 4    

    //store current user's account type;  account type determines user privileges
    $account_type = $_SESSION["account_type"];

    //store the name of the current page that the user is on 
    //$currentPage = basename(__FILE__); //saving current page that user is on
    $currentPage = basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */

    if ($account_type == ADMIN_ACCT_TYPE) { //if user's account type is administrator
        //loop through approved webpages for administrators and redirect accordingly
        $found = false;
        foreach ($admin_webpage_array as $page) {
            if ($currentPage == $page)
                $found = true;
        }
        if (!$found) //if user is NOT on an approved page
            header("location: welcome.php");    //redirect to welcome page	
    } elseif ($account_type == GENERAL_ACCT_TYPE) { //if user's account type is general user
        //loop through approved webpages for general users and redirect accordingly
        $found = false;
        foreach ($generalUser_webpage_array as $page) {
            if ($currentPage == $page)
                $found = true;
        }
        if (!$found) //user is NOT on an approved page
            header("location: welcome.php");    //redirect to welcome page
        else { //user is on an approved page
            
            if ($currentPage == "new-user-save.php" || $currentPage == "new-user-form.php") //pages pertaining to adding profiles           
                if ($_SESSION["profile_completed"] == true) //if user's profile has previously been completed
                    header("location: welcome.php");//redirect to welcome page
        }
    } elseif ($account_type == HEALTHCARE_ACCT_TYPE) { //if user's account type is healthcare professional
        //loop through approved webpages for healthcare professionals and redirect accordingly
        $found = false;
        foreach ($healthcareProfessional_webpage_array as $page) {
            if ($currentPage == $page)
                $found = true;
        }
        if (!$found) //if user is NOT on an approved page
            header("location: welcome.php");    //redirect to welcome page	

    } else //user's account type is business user
    {
        //loop through approved webpages for business users and redirect accordingly
        $found = false;
        foreach ($businessUser_webpage_array as $page) {
            if ($currentPage == $page)
                $found = true;
        }
        if (!$found) //user is NOT on an approved page
            header("location: welcome.php");    //redirect to welcome page
        else { //user is on an approved page

            if ($currentPage == "new-business-save.php" || $currentPage == "new-business-form.php") //pages pertaining to adding profiles
                {
                    if ($_SESSION["profile_completed"] == true) //if user's profile has previously been completed
                    header("location: welcome.php");    //redirect to welcome page
                }
            elseif ($currentPage == "scan.php" && $_SESSION["profile_completed"] == false)
                header("location: welcome.php");    //redirect to welcome page
        }
    }
}
