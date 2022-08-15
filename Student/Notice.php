<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Teacher</title>
    <link rel="stylesheet" href="Marks.css">
  </head>
  <body>
    <div class="sidebar">
      <header>Welcome</header>
      <a href="index.php">
        <i class=""></i>
        <span>ROUTINE</span>
      </a>
      <a href="Marks.php">
        <i class=""></i>
        <span>MARKS</span>
      </a>
      <a href="Notice.php"  class="active">
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



          <div class="main" style="margin-top:40px; margin-left:42%;">
            <table style="border:3px solid black;border-collapse:collapse;">
            <tr>
              <td  colspan="2" align=center> <h1>Notice</h1></td>
            </tr>
            <tr>
              <td style="border:1px solid green; padding: 10px;"><h3>Course Name</h3></td>

              <td align=center style="border:1px solid green;padding: 10px;"><h3>Notices</h3></td>
            </tr>
            <tr>
              <td style="border:1px solid green;padding: 10px;">Digital Logic</td>
              <td style="border:1px solid green;padding: 10px;">Internet Not working so no class</td>


            </tr>
            <tr>
                <td style="border:1px solid green;padding: 10px;">English</td>
                <td style="border:1px solid green;padding: 10px;">Today is raining so Digital HICOLE will be closed</td>


            </tr>
            <tr>
                  <td style="border:1px solid green;padding: 10px;">Physics</td>
                  <td style="border:1px solid green;padding: 10px;">Be prepared for unit test exam on 2nd march</td>


            </tr>
            <tr>
                      <td style="border:1px solid green;padding: 10px;">Chemistry</td>
                      <td style="border:1px solid green;padding: 10px;">I have uploaded notes on drive check it out</td>


            </tr>
            <tr>
                      <td style="border:1px solid green;padding: 10px;">Math</td>
                      <td style="border:1px solid green;padding: 10px;">Submit your assignment ASAP!</td>


            </tr>
            <tr>
                      <td style="border:1px solid green;padding: 10px;">History</td>
                      <td style="border:1px solid green;padding: 10px;">Read chapter num 2</td>


            </tr>
            <tr>
                      <td style="border:1px solid green;padding: 10px;">Biology</td>
                      <td style="border:1px solid green;padding: 10px;">Submit your practical report by sunday</td>


            </tr>

            </table>


  </body>
</html>

<?php
}else {
  header("Location: ../index.php");
  exit();
}
 ?>
