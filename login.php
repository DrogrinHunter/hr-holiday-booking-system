<?php
include('includes/css-links.php');
include('includes/login-css.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  echo $cssLinks;
  echo $loginCss;
  ?>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<script>
  function logincheck($conn) {

    $.get("query.php", {
        email: $("#email").val(),
        password: $("#loginpassword").val(),
        action: "ath"
      })
      .done(function(data) {
        // data = JSON.parse(data);
        if (data["status"] == 1) {
          displayAlert();
          setTimeout(timeOut, 2500)
        } else {
          alert("Error");
          return;
        }
      });

  }


  function displayAlert() {
    Swal.fire({
      icon: 'success',
      title: 'You have signed in successfully',
      showConfirmButton: false
    })
  }

  function timeOut() {
    window.location.replace("index.php");
  }
</script>

<body>
  <!-- Nav Bar with options disabled -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark main-font">
    <div class="d-flex flex-grow-1">
      <span class="w-100 d-lg-none d-block">
        <!-- hidden spacer to center brand on mobile -->
      </span>
      <a class="navbar-brand d-none d-lg-inline-block" href="index.php">
        <img class="main_logo" src="assets/img/resized-logo.png">
        Holiday Bookings
      </a>
      <div class="w-100 text-right">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
    <div class="collapse navbar-collapse flex-grow-1 text-right " id="myNavbar">
      <ul class="navbar-nav ml-auto flex-nowrap">
        <li class="nav-item">
          <a href="index.php" class="nav-link m-2 menu-item disabled">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link m-2 menu-item dropdown-toggle disabled" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            User's Holiday
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="name-holiday.php">Holiday Allowance</a>
            <a class="dropdown-item" href="name-book.php">Book Holiday</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link m-2 menu-item dropdown-toggle disabled" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Team Holiday
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="team-check.php">Check Holiday</a>
            <a class="dropdown-item" href="team-review.php">Approve / Deny Requests</a>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link m-2 menu-item disabled">Reports</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link m-2 menu-item disabled">Sickness</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link m-2 menu-item disabled">Log Off</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- End of Nav -->
  <!-- Login Form -->

  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form>
                  <div>
                    <img src="assets/img/resized-white-bkgrd.png" alt="MFM Logo" />
                  </div>
                  <!-- <div class="d-flex align-items-center mb-3 pb-1">
                    <img src="assets/img/resized-logo.png" alt="MFM Logo" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div> -->

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="loginpassword" id="loginpassword" class="form-control form-control-lg" />
                    <span toggle="#loginpassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <label class="form-label" for="loginpassword">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <input class="btn btn-dark btn-lg btn-block" type="button" name="Submit" value="Submit" onClick="logincheck()">
                    <!-- <button class="btn btn-dark btn-lg btn-block" type="button" value="Submit">Login</button> -->
                  </div>
                  <!-- 
                  <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!" style="color: #393f81;">Register here</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a> -->
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <script>
    $(".toggle-password").click(function() {

      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") === "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  </script>




</body>

</html>