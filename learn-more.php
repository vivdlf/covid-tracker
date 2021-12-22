<?php
/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
require_once "navigation.php";

// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Learn More</title>
<link rel="shortcut icon" href="images/favicon-logo.ico" />
<link rel="stylesheet" href="css/learn-more-style.css">
</head>
<body> 
    <div class="logo"> <img src="images/logo.png" style="height:123px;width:338px;"> </div>

    <!--Details which inform the user of the app & scanning-->
    <div class="details">
    
        <h2>The Problem</h2>
        <br>
        <p>COVID-19 has taken a devastating toll on Belize and its people. The most prominent of<br>
         which is the number of fatalities which has reached upwards of 300 and has led to thousands<br>
         of positive cases. The full extent of damage sustained either directly or indirectly as a result<br>
         of this virus is slowly emerging. However, what is certain is that it has diminished the quality<br>
        of life for everyone and also placed a huge strain on the health department as they must<br>
        contend with performing daily testing and contact tracing. In effect, as cases increase, so does<br>
        the complexity of performing contact tracing, which eventually gets to a point where it<br>
        becomes unmanageable and thus leads to even more cases. The primary bottleneck in this<br>
        process is the inability of the health department to notify suspected victims in a timely<br>
        manner or any at all, thereby lulling them into a false sense of security, which ultimately<br>
        leads to their complacency which can cause the virus to spread, essentially prompting a<br>
        vicious cycle. Equally damaging is the fact that as cases increase, so does panic and distress<br>
        among the population. An activity as simple as going grocery shopping can start to feel<br>
        unsafe, which can have rippling negative effects on the economy.</p>
        <br>
        <p>Moreover, despite a vaccine being developed, COVID-19 will always be with us. It is<br>
        therefore imperative that we learn how to live with it and minimize its casualties. And one of<br>
        the most effective ways of achieving this is by conducting rapid contact tracing. This can be<br>
        done effectively through the use of technology.  In particular, a system/app that tracks the <br>
        whereabouts of its users and is capable of quickly notifying them when there is an outbreak<br>
        can be an indispensable tool for bringing this virus under control.</p>
        <br>

        <h2>COVID-19 Tracker - The Solution </h2>
        <br>
        <p>COVID-19 Tracker is a web application designed to track the whereabouts of its users.<br>
        Tracking of user's whereabouts is done effectively through the use of technology. In particular, <br>
        each user is granted a unique QR code which is then scanned by a business upon the  <br>
        user's entrance into the business establishment. This process allows the system to <br>
        effectively track a users whereabouts.  Moreover, COVID-19 Tracker is also capable <br>
        of quickly notifying a user when he/she is a close contact of a infected COVID-19  <br>
        individual. Also, COVID-19 Tracker grants healthcare professionals the ability<br>
        to generate close-contact reports and send notifications to individuals who have <br>
        tested positive for COVID-19 and to people who have come in contact with them.
        </p>
    
        <br>
        <hr>
        <br>
        <h2>Frequently Asked Questions</h2>
        <br>
        <h3>How do I generate a QR code?</h3>
        <p>After creating your COVID-19 Tracker account and logging in you will be prompted to fill out a personal<br>
        form from which your unique QR code will be generated from. Please be advised that only accounts of General<br>
        User are granted the ability to generate a QR code. Therefore, if you have a Business account you will<br>
        be able to generate a QR code.</p>
        <br>
        <h3>How does scanning work?</h3>
        <p>As a business whenever a customer enters your establishment politely ask for their COVID-19 Tracker QR<br>
        code and proceed to scan it. The scanning option can be found on the welcome page in the bottom left corner.<br>
        Once you have clicked on the option you will be redirected to the scanner page in which you can choose the<br>
        the rear facing camera of your choice. After you have chosen the camera of your choice simply hold the QR<br>
        code steadily so the scanner can read the code. You will be notified of the validity of the QR code.</p>
        <br>
        <h3>When will I be notified that I am a close contact?</h3>
        <p>You will be notified that you are a close contact of an infected individual as soon as the individual is<br>
        diagnosed as positive.</p>
        <br>
        <h3>What medium is used to notify individuals?</h3>
        <p>Notifications are sent via email. The email in which it is sent to is the email you entered into the <br>
        form when you first created your account.</p>
        <br>
        <h3>What type of accounts are there?</h3>
        <p>There are four types of accounts. Those being General User, Business, Healthcare Professional, and Admin.<br>
        The general public is only given the choice to choose between an account of type General User or Business <br>
        for privacy reasons.</p>
        <br>
        <h3>Where can I view my QR code? </h3>
        <p>You are able to view your QR code by clicking the button, ‘View QR Code’ on the welcome page.
        </p>
        <br>
        <h3> Do I fill the form multiple times?</h3>
        <p>No. The form will be filled out once upon the creation of your account. After the form has been filled out,<br>
        you will never get prompted to fill it out again.</p>
        <br>
        <h3>How will I know if the QR code I scanned is valid?</h3>
        <p>Upon scanning a QR code, on the right side of your screen under the heading ‘Validity,’ you will be notified <br>
        if the code is valid or not</p>
        <br>
        <h3>Is my data kept confidential?</h3>
        <p>Rest assured that anonymity and confidentiality will be maintained at all times.</p>

        <br><br>
        <h3>Contact us at <a href = "mailto:covidtrackersystem2021@gmail.com">covidtrackersystem2021@gmail.com</a> if you any further questions or concerns.</h3>

        <br>
    </div> 

    <!--Image on the left hand side-->
    <div  class="Topright"> 
        <img src="images/people.png" style="height:300px;width:400px;">
    </div> 
    <div  class="Botright"> 
        <img src="images/app.png" style="height:436px;width:620px;">
    </div>  
</body>
</html>