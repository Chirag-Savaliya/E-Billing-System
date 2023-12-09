  <?php
  session_start();
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Style.css">
    <script type="text/javascript" src="js/Script.js"></script>
  </head>
  <body>
  	<!-- Navigation Bar -->
  </body>
  <div>
    <nav id="hdr" class="navbar navbar-expand-lg navbar-light sticky-top">
      <img id="logo" src="images/logo.jpg">
      <a id="lbl" class="navbar-brand" href="#">E-Billing System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a id="mnuHome" class="nav-link" href="Index.php">HOME</a>
          </li>
          <li class="nav-item dropdown">
            <a id="mnuUser" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" onclick="ManagePills(this.id)">USER</a>
            <div class="dropdown-menu">
              <a id="mnuSignup" class="dropdown-item" href="Signup.php">SIGNUP</a>
              <a id="mnuSignin" class="dropdown-item" href="Signin.php">SIGNIN</a>
              <a id="mnuSignout" class="dropdown-item disabled" href="Signout.php">SIGNOUT</a>
              <a id="mnuProfile" class="dropdown-item disabled" href="Profile.php">PROFILE</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a id="mnuMngmnt" class="nav-link dropdown-toggle disabled" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" onclick="ManagePills(this.id)">OPTIONS</a>
            <div class="dropdown-menu">
              <a id="mnuProducts" class="dropdown-item" href="Products.php">PRODUCTS</a>
              <a id="mnuNewBill" class="dropdown-item" href="NewBill.php">NEW BILL</a>
              <a id="mnuCart" class="dropdown-item" href="Generatebill.php">CART</a>
            </div>
          </li>
          <li class="nav-item">
            <a id="mnuAboutus" class="nav-link" href="Aboutus.php">ABOUTUS</a>
          </li>
          </ul>
        </div>
      </nav>

      <div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100 slidr" src="images/i1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 slidr" src="images/i2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 slidr" src="images/i3.jpg" alt="Third slide">
            </div>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
    if(isset($_SESSION["User"]))
    {
      echo "<script>document.getElementById('mnuSignout').classList.remove('disabled');</script>";
      echo "<script>document.getElementById('mnuMngmnt').classList.remove('disabled');</script>";
      echo "<script>document.getElementById('mnuProfile').classList.remove('disabled');</script>";
      echo "<script>document.getElementById('mnuSignin').classList.add('disabled');</script>";
      echo "<script>document.getElementById('mnuSignout').href='Signout.php';</script>";
      echo "<script>document.getElementById('mnuMngmnt').href='#';</script>";
      echo "<script>document.getElementById('mnuProfile').href='Profile.php';</script>";
    }
    else
    {
      echo "<script>document.getElementById('mnuSignout').classList.add('disabled');</script>";
      echo "<script>document.getElementById('mnuMngmnt').classList.add('disabled');</script>";
      echo "<script>document.getElementById('mnuProfile').classList.add('disabled');</script>";
      echo "<script>document.getElementById('mnuSignin').classList.remove('disabled');</script>";
      echo "<script>document.getElementById('mnuSignout').href='#';</script>";
      echo "<script>document.getElementById('mnuMngmnt').href='#';</script>";
      echo "<script>document.getElementById('mnuProfile').href='#';</script>";
    }
    ?>