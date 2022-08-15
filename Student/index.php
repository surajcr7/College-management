<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Teacher</title>
    <link rel="stylesheet" href="Routine.css">
  </head>
  <body>
    <div class="sidebar">
      <header>Welcome</header>
      <a href="index.php" class="active">
        <i class=""></i>
        <span>ROUTINE</span>
      </a>
      <a href="Marks.php" >
        <i class=""></i>
        <span>MARKS</span>
      </a>
      <a href="Notice.php">
        <i class=""></i>
        <span>NOTICE</span>
      </a>
      <a href="../include/logout.php">
        <i class=""></i>
        <span>Logout</span>
      </a>
    </div>
    <div class="cms">
      <p style="margin-left:35%">College Management System</p>
    </div>

    <div class="main" style="margin-top:40px; margin-left:40%;">
      <table style="border:3px solid black;border-collapse:collapse;">
      <tr>
      <td  colspan="10" align=center> <h1>Routine</h1></td>
      </tr>
      <tr>
      <td colspan="2" align=center style="color:#519FEE;border:1px solid green;padding: 10px;"><h3>Sunday</h3></td>
        <td colspan="2" align=center style="color:#519FEE;border:1px solid green;padding: 10px;"><h3>Monday</h3></td>
        <td colspan="2" align=center style="color:#519FEE;border:1px solid green;padding: 10px;"><h3>Tuesday</h3></td>
        <td colspan="2" align=center style="color:#519FEE;border:1px solid green;padding: 10px;"><h3>Wednesday</h3></td>
        <td colspan="2" align=center style="color:#519FEE;border:1px solid green;padding: 10px;"><h3>Thursday</h3></td>

      <tr>
        <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
          <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
          <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
          <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
          <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
      </tr>
      <tr>
          <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
            <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
            <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
            <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
            <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
      </tr>
      <tr>
            <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
              <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
              <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
              <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
              <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
            </tr>
            <tr>
              <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
                <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
                <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
                <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
                <td colspan="2" align=center style="border:1px solid green;padding: 10px;"><h3>Bengali<br>11.00-12.30</h3></td>
              </tr>

      </table>
      </div>

  </body>
</html>

<?php
}else {
  header("Location: ../index.php");
  exit();
}
 ?>
