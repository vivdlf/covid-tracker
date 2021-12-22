<?php
/* 
Written by: Juan Sarabia
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
require_once "permissions.php";
require_once "navigation.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/report-style.css">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jspdf/1.2.61/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>Generate Report</title>
  </head>
  <body class="b">
    <div class="container">
    <br> <br>

    <h2 align="center"> Close Contact Reports </h2><br />
    
    <div class="input-group mb-3 box">
      <!-- <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span> -->
      <i class="fa fa-search" aria-hidden="true"></i>
      <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search by name or ID" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <br/>

    <!--This is used to show the user listing-->
    <div id="result"></div>
    
    </div>
    
    <br>
    <div class="container" >
        <hr>
        <br>
        <h3 align="center" id="reportLabel" style="display: none;"> Report Details </h3>
        <div id="report" ></div>
        <input type="button" id="btnExport" class="btn btn-success btn-l" value="Download" />
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.2.0/jspdf.umd.min.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    
  </body>
</html>


<script>
$(document).ready(function(){

 load_patients();

 function load_patients(query)
 {
    //  alert('funcion')
  $.ajax({
   url:"report-fetch-patients.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_patients(search);
  }
  else
  {
    load_patients();
  }
 });

});

 const makeReport = (event) => {
     document.getElementById('reportLabel').style.display = 'block';
     $.ajax({
       url:"report-generate.php",
       method:"POST",
       data:{query: event.target.id},
       success:function(data)
       {
        $('#report').html(data);
       }
      });
 };

//Generate the pdf to download
var doc = new jsPDF('l', 'pt', "LEGAL");
var specialElementHandlers = {
    '#reportLabel': function (element, renderer) {
        return true;
    }
};

//generates the pdf file to be downloaded
$("body").on("click", "#btnExport", function () {
            html2canvas($('#report')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("close-contacts.pdf");
                }
            });
        });
</script> 


