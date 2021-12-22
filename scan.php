<?php
/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
  require_once "navigation.php";
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Scanner</title>
<link rel="shortcut icon" href="images/favicon-scanner.ico" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link rel="stylesheet" href="css/scanner-style.css">
<style type="text/css">
#preview{
   width:550px;
   height: 550px;
   margin:0px auto;
   padding-top:1px;
   position: absolute; 
   /* left: -40px; 
   top: 75px;  */
   left: 20px; 
   top: 50px;
}

.result {
    float: right; 
    margin : 0 ; 
    padding-right: 305px;
    padding-top:1px;
    position: absolute; 
    right: -100px; 
    top: 245px;
}
.heading{font-weight: bold; text-align: center; font-size:25px;}
.btn-group{
    position: absolute;
    height: 44px; 
    left: 48px; 
    bottom: 200px;
}
</style>
</head>
<body>
    
    <div class="wrapper">
    <!--Scanner-->
    <div class="page-header">
        <h1>Scan QR Code</h1>
    </div>

    <!--Instructions-->
    <div class="page-info">
    <p>Choose the rear facing camera of your choice & scan the customer's QR code.<br>
      You will be notified of the validity of the QR code.</p>
    </div>

    <br>
    <!--Scan Results-->
   <div class="result">
        <label class="heading">Qr Code Value</label><br><br>
        <input type="text" name="text" id="text" readonly="" class="form-control"><br><br>

        <label class="heading">Validity</label><br><br>
        <input type="text" name="text1" id="text1" readonly="" class="form-control">
    </div>
    <div id="receivetext">
    </div>
    <div class="scanner">

    <!--Camera Preview-->
    <video id="preview"></video>

    <!--Javascript & Jquery -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">

    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });

    Instascan.Camera.getCameras().then(function (cameras){

        //If there is a camera, then proceed to being scanning.
        if(cameras.length>0){
            scanner.start(cameras[0]);
            //Check which camera the user chose to use, either the front or back camera.
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }
        //If there is no camera, notify the user
        else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });

    //Scan the QR code
    scanner.addListener('scan',function(c){
        document.getElementById("text").value=c;


        //After scanning we check to see if it is a valid QR code
    //     $.ajax({
    //          method: "POST",
    //          url: "new-scan-log.php",
    //         data: { scannedQrCode: c }
    //     })
    //     .done(function( response ) {
    //          $("#text1").html(response);
    //     });
    //     // .fail(function(jqXHR, textStatus, errorThrown) { 
    //     //     alert("Error")   ; })

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("text1").value = this.responseText;
      }
    };
    xmlhttp.open("GET","scan-log-save.php?q=" + c,true);
    xmlhttp.send();



     });
</script>

 <!--Give the user the option to choose between the back or front camera-->
    <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
        <label class="btn btn-primary active">
            <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
        </label>

        <label class="btn btn-secondary">
            <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
        </label>
     </div>
</div>
    </div>

<div class="img-scan"><img src="images/scanner.png" style="height:416px;width:416px;"></div>
</body>
</html>
