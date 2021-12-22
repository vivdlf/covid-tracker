<?php
/* 
Written by: Viviannie De La Fuente & Rafael Ramos
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
include('libs/phpqrcode/qrlib.php'); 
require_once "permissions.php";
require_once "navigation.php";

//Retrieve QR Code ID
$qrContent = $_SESSION["qrCodeId"];

// echo $qrContent;
	//Generate QR Code
	$tempDir = 'temp/'; 
	$filename = 'qr-code';
	$codeContents = $qrContent; 
	QRcode::png($codeContents, 
	
	$tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);

?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
	<title> QR Code</title>
	<!-- <link rel="stylesheet" href="libs/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/qr-code-style.css">
	</head>
	<body>
			<!--QR Code Display-->
			<div class="qr-field">
				<h2 style="text-align:center">Your Personal QR Code</h2>
				<center>
					<div class="qrframe" style="border:2px solid black; width:310px; height:310px;">
							<?php echo '<img src="temp/'. @$filename.'.png" style="width:300px; height:300px;"><br>'; ?>
					</div>
					<a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="qr-code-save.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
				</center>
			</div>


			<!-- Popup -->
		<a href="#" id="reminder" class="note">Reminder</a>
		<a href="#" id="close-this" class="note">Close</a>

		<div id="popup">
  			<p>Your QR code is key for contact tracing. Therefore, ensure to always have your QR code on hand 
   			whenever entering a business establishment. In doing so you allow for establishments to scan
   			your code which is then used to keep track of your whereabouts. Rest assured your information is
   			kept confidential and anonymity is remained at all times.
  			</p>
  			
			<p><strong>Remember:</strong></p>
  			
   				<p>- Wash your hands frequently.</p>
    			<p>- Wear your mask at all times.</p>
    			<p>- Ensure to social distance when in public places.</p>
    			<p>- Minimize contact with people.</p>
    			<p>- Stay home if you can. </p>
		</div>

		<!--Javascript-->
		<script src="node_modules\jquery\dist\jquery.min.js"></script>
		<script type="text/javascript" src="js/pop-up.js"></script>
		</div>
	</body>
</html>