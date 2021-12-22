<?php
/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
require_once "permissions.php";
require_once "navigation.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style type="text/css">
        .wrapper {
            font: 14px sans-serif;
            text-align: left;
            position: absolute;
            left: 70px;
            z-index: -1;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
</body>
</html>