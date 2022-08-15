<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Teacher</title>
    <link rel="stylesheet" href="Courses.css">
  </head>
  <body>
    <div class="sidebar">
      <header>Welcome</header>
      <a href="../Teacher/index.php" class="active">
        <i class=""></i>
        <span>COURSES</span>
      </a>
      <a href="../Teacher/Section/Section.php" >
        <i class=""></i>
        <span>SECTION</span>
      </a>
      <a href="../Teacher/Notice/Notice.php">
        <i class=""></i>
        <span>NOTICE</span>
      </a>
      <a href="../include/logout.php">
        <i class=""></i>
        <span>Logout</span>
      </a>

    </div>
    <div class="cms">
      <p style="margin-left:25%">College Management System</p>
    </div>

    <div class="main" style="margin-top:40px; margin-left:40%;">
      <table style="border:3px solid black;border-collapse:collapse;">
      <tr>
      <td  colspan="5" align=center> <h1> Current Course list </h1></td>
      </tr>
      <tr>
      <td style="border:1px solid green;padding: 10px;"><h3>Course Name</h3></td>
        <td style="border:1px solid green; padding: 10px;"><h3>Section Name</h3></td>
        <td style="border:1px solid green;padding: 10px;"><h3>College Year</h3> </td>

        <td style="border:1px solid green;padding: 10px;"><h3>Day</h3></td>
        <td style="border:1px solid green;padding: 10px;"><h3>Time</h3></td>
      </tr>
      <tr>
        <td style="border:1px solid green;padding: 10px;">Physics-1</td>
        <td style="border:1px solid green;padding: 10px;">A</td>
        <td style="border:1px solid green;padding: 10px;">1st</td>

        <td style="border:1px solid green;padding: 10px;">Monday <br> Wednesday </td>
        <td style="border:1px solid green;padding: 10px;">8.30-9.30</td>
        </tr>
        <tr>
          <td style="border:1px solid green;padding: 10px;">Physics-1</td>
          <td style="border:1px solid green;padding: 10px;">B</td>
          <td style="border:1px solid green;padding: 10px;">2nd</td>

          <td style="border:1px solid green;padding: 10px;">Tuesday <br> Sunday </td>
          <td style="border:1px solid green;padding: 10px;">11.00-12.30</td>


          </tr>
          <tr>
          <td style="border:1px solid green;padding: 10px;">Physics-2</td>
            <td style="border:1px solid green;padding: 10px;">C</td>
            <td style="border:1px solid green;padding: 10px;">2nd</td>

            <td style="border:1px solid green;padding: 10px;">Thursday <br> Tuesday </td>
            <td style="border:1px solid green;padding: 10px;">9.30-11.00</td>
            </tr>
      </table>
      </div>

  </body>
</html>

<?php
}else {
  header("Location: ../../index.php");
  exit();
}
 ?>
