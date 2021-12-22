<?php
/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
require_once "permissions.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>COVID-19 Tracker</title>
    <link rel="shortcut icon" href="images/favicon-logo.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/navigation-style.css" /> 
</head>
<body>
    <!--Left Vertical Navigation Bar-->
    <div class="navigation">
        <ul>
            <li>
                <a href="welcome.php">
                    <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                    <span class="title">Home</span>
                </a>
            </li>
            
            <li>
                <a href="learn-more.php">
                    <span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                    <span class="title">About</span>
                </a>
            </li>

            <li>
            <a href="tips.php">
                    <span class="icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                    <span class="title">Tips</span>
                </a>
            </li>

            <!--Privileges-->
            <?php
        if ($_SESSION['account_type'] == 4) //business user
            echo //'<a href="scan.php" class="btn btn-primary">Scan Customer</a>';
            '<li>
            <a href="scan.php">
                    <span class="icon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                    <span class="title">Scanner</span>
                </a>
            </li>';
        elseif ($_SESSION['account_type'] == 2) //general user
            echo //'<a href="qr-code-create.php" class="btn btn-primary">View QR-Code</a>';
            '<li>
            <a href="qr-code-create.php">
                    <span class="icon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                    <span class="title">QR Code</span>
                </a>
            </li>';
        elseif ($_SESSION['account_type'] == 3) { //healthcare professional
            echo //'<a href="send-notification.php" class="btn btn-primary">Send Notifications</a>&nbsp;';
            '<li>
            <a href="diagnosis-create.php">
                    <span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                    <span class="title">Diagnosis</span>
                </a>
            </li>';
            echo //'<a href="send-notification.php" class="btn btn-primary">Send Notifications</a>&nbsp;';
            '<li>
            <a href="report.php">
                    <span class="icon"><i class="fa fa-file" aria-hidden="true"></i></span>
                    <span class="title">Reports</span>
                </a>
            </li>';
            echo //'<a href="index.php" class="btn btn-primary">Generate Report</a>';
            '<li>
            <a href="send-notification.php">
                    <span class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <span class="title">Notifications</span>
                </a>
            </li>';
        }
        ?>
            <li>
            <a href="reset-password.php">
                    <span class="icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <span class="title">Reset Password</span>
                </a>
            </li>

            <li>
            <a href="logout.php">
                    <span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>

    <!--Toggle Option-->
    <div class="toggle" onclick="toggleMenu()"></div>

    <!--Javascript-->
    <script type="text/javascript">
        function toggleMenu(){
            let navigation = document.querySelector('.navigation');
            navigation.classList.toggle('active');

            let toggle = document.querySelector('.toggle');
            toggle.classList.toggle('active');
        }
    </script>

</body>
</html>