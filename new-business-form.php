<?php
/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
require_once "permissions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <title>Creating Business Profile</title>
        <link rel="stylesheet" href="css/form-info-style.css">
        <link rel="stylesheet" href="css/form-style.css">
        <link rel="shortcut icon" href="images/favicon-business.ico" />
</head>

<body>
          <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <div class="modal sl clearfix">
    <div class="modal-product">
      <div class="product">

        <!-- Slideshow container -->
        <div class="product-slideshow">

          <!-- Full-width images with number and caption text -->
          <div class="productSlides fade">
            <img src="images/Fill Form.png" style="width:105%" height="330" >
            <p class="product-name">
              Fill the form to generate a QR Code.
            </p>
          </div>

          <div class="productSlides fade">
            <img src="images/QR Code.png" style="width:100%">
            <p class="product-name">
              <br><br>Save your QR Code.
            </p>
          </div>

          <div class="productSlides fade">
            <img src="images/Scan.png" style="width:100%">
            <p class="product-name">
              <br>Take your QR Code with you <br> to business establishments so it can be scanned.
            </p>
          </div>

          <div class="productSlides fade">
            <img src="images/not.png" style="width:100%">
            <p class="product-name">
              <br> Recieve a notification when you've come in close-contact to someone who is COVID-19 positive.
            </p>
          </div>

          <div class="productSlides fade">
            <img src="images/mask.png" style="width:100%">
            <p class="product-name">
              Remember, don't make someone ask, wear a mask!
            </p>
          </div>

          <br>

          <!-- The dots/circles -->
          <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
          </div>

        </div>

      </div>
      <div class="round-shape"></div>
    </div>
        <div class="container modal-info">

                <form id="signup" class="form" action="new-business-save.php" method="post">
                <ul class="form-list">
                        <h1>Create Business Profile</h1>

                      
                                <legend>Business Details:</legend>
                                <div class="form-field">
                                        <label for="name">Business Name:</label>
                                        <input type="text" name="business_name" id="business_name" autocomplete="off" placeholder="Enter Name of Business">
                                        <small></small>
                                </div>

                                <div class="form-field">
                                        <label for="Email">Email:</label>
                                        <input type="text" name="email" id="email" autocomplete="off" placeholder="Enter your email">
                                        <small></small>
                                </div>
                  

                        
                                <legend>Address Details:</legend>
                                <div class="form-field">
                                        <label for="address_street">Address Street:</label>
                                        <input type="addressStreet" id="address_street" name="address_street" placeholder="Street Name">
                                        <small></small>
                                </div>

                                <div class="form-field">
                                        <label for="address_number">Address Number:</label>
                                        <input type="adddressNumber" id="address_number" name="address_number" placeholder="Street Number">
                                        <small></small>
                                </div>

                                <div class="form-field">
                                        <label for="address_city">Address City:</label>
                                        <input type="addressCity" id="address_city" name="address_city" placeholder="City">
                                        <small></small>
                                </div>

                                <div class="form-field">
                                        <label for="district">Address District:</label>
                                        <select name="address_district" id="address_district">
                                                <option value="Corozal">Corozal</option>
                                                <option value="Orange Walk">Orange Walk</option>
                                                <option value="Cayo">Cayo</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Stann Creek">Stann Creek</option>
                                                <option value="Toledo">Toledo</option>
                                        </select>
                                        <small></small>
                                </div>
                   

                        <div class="form-field">
                                <input type="submit" value="Sign Up" class="btn">
                        </div>
                </form>
        </div>
        <script  src="js/form-script.js"></script>
        <script src="js/business_validation.js"></script>
</body>

</html>