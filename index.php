<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {
  if ($_SESSION['user_type'] == 1) {
    header("Location: Admin/index.php");
    exit();
  }else if ($_SESSION['user_type'] == 2) {
    header("Location: Teacher/index.php");
    exit();
  }else if ($_SESSION['user_type'] == 3) {
    header("Location: Student/index.php");
    exit();
  }
}else {

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log In | College Management System</title>
    <link rel="stylesheet" href="logIn.css">
  </head>
  <body>

    <div class="header">
        <h2 style="text-align:center;">College Management System</h2>
      </div>


   <div class="wrapper">
      <div class="title">Login Form</div>
        <form method="post" action="include/login.php">
                    <div class="field">
                      <input type="text" name="username" required>
                      <label>Username</label>
                    </div>
                    <div class="field">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
            <div class="content">
                      <div class="checkbox">

                          <input type="checkbox" id="remember-me">
                          <label for="remember-me">Remember me</label>
                      </div>
                  <div class="pass-link">
                    <a href="#">Forgot password?</a>
                  </div>
            </div>
            <?php if (isset($_GET['error'])) { ?>
              <p class="error"> <?php echo $_GET['error'];?> </p>
            <?php } ?>
            <div class="field">
                  <input type="submit" value="Login">
            </div>
            
      </form>
  </div>
</body>
</html>

<?php
}
 ?>
