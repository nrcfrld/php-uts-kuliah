<?php
require_once 'helper/auth.php';

if (isLogin()) {
  header('Location: dashboard/index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Mazer Admin Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/app.css">
  <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
  <div id="auth">

    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <div class="auth-logo">
            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
          </div>
          <h1 class="auth-title">Log in.</h1>
          <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

          <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert" style="display: none;">
            Wrong username or password!
          </div>
          <form action="" method="POST" id="form-login">
            <div class="form-group position-relative has-icon-left">
              <input type="text" class="form-control form-control-xl" placeholder="Username" name="username" id="username">
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
            </div>
            <p class="text-danger" id="username-message" style="display: none;">Username is required</p>

            <div class="form-group position-relative has-icon-left mt-4">
              <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" id="password">
              <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>
            <p class="text-danger" id="password-message" style="display: none;">Password is required</p>
            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
          </form>

        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right" style="max-height: 100vh">
          <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
            <ol class="carousel-indicators">
              <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
            </ol>
            <div class="carousel-inner h-100">
              <div class="carousel-item active h-100">
                <img src="https://images.unsplash.com/photo-1620306347161-38f7281dbda1?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" class="d-block w-100" style="object-fit: cover;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
              </div>
              <div class="carousel-item h-100">
                <img src="https://images.unsplash.com/photo-1620259525876-777d53243fd8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" class="d-block w-100" style="object-fit: cover;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="assets/vendors/jquery/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      const username = $("#username");
      const password = $("#password");
      let is_error = false;

      $("#form-login").submit(function(e) {
        e.preventDefault();

        if (!username.val()) {
          $("#username-message").fadeIn(300);
          is_error = true;
        }

        if (!password.val()) {
          $("#password-message").fadeIn(300);
          is_error = true;
        }

        if (!is_error) {

          // Send Ajax Request
          $.ajax({
            type: "POST",
            url: 'login_action.php',
            data: {
              username: username.val(),
              password: password.val()
            },
            dataType: "json",
            success: function(data) {
              if (!data) {
                // If Login Error
                $("#alert").show()
              } else {
                // If Login Success
                window.location.href = "dashboard/index.php"
              }
            }
          })

        }
      });

      username.keyup(function() {
        if ($(this).val()) {
          $("#username-message").hide();
          is_error = false;
        }
      });

      password.keyup(function() {
        if ($(this).val()) {
          $("#password-message").hide();
          is_error = false;
        }
      });
    });
  </script>
</body>

</html>