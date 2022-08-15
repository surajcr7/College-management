<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Teacher</title>
    <link rel="stylesheet" href="Section.css">
  </head>
  <body>
    <div class="sidebar">
      <header>Welcome</header>
      <a href="../index.php" >
        <i class=""></i>
        <span>COURSES</span>
      </a>
      <a href="../Section/Section.php"  class="active" >
        <i class=""></i>
        <span>SECTION</span>
      </a>
      <a href="../Notice/Notice.php">
        <i class=""></i>
        <span>NOTICE</span>
      </a>
      <a href="../../include/logout.php">
        <i class=""></i>
        <span>Logout</span>
      </a>
    </div>
    <div class="cms">
      <p style="margin-left:25%">College Management System</p>
    </div>

    <div class="navbar" style="margin-left:auto; margin-top:0%;">
    <div class="topnav">
    <a href="Section.php" class="active" >ACTIVE SECTIONS</a>
    <a href="Marks.php" >UPLOAD MARKS</a>
    </div>
    </div>

    <div class="main" style="margin-top:40px; margin-left:40%;">
      <table style="border:3px solid black;border-collapse:collapse;">
      <tr>
        <td  colspan="3" align=center> <h1> Current Section list </h1></td>
      </tr>
      <tr>
        <td style="border:1px solid green; padding: 10px;"><h3>Section Name</h3></td>
        <td style="border:1px solid green;padding: 10px;"><h3>College Year</h3> </td>
        <td style="border:1px solid green;padding: 10px;"><h3>Course Name</h3></td>
      </tr>
      <tr>
        <td style="border:1px solid green;padding: 10px;">A</td>
        <td style="border:1px solid green;padding: 10px;">1st</td>
        <td style="border:1px solid green;padding: 10px;">Physics-1</td>
        </tr>
      <tr>
          <td style="border:1px solid green;padding: 10px;">B</td>
          <td style="border:1px solid green;padding: 10px;">2nd</td>
          <td style="border:1px solid green;padding: 10px;">Physics-1</td>
      </tr>
      <tr>
            <td style="border:1px solid green;padding: 10px;">C</td>
            <td style="border:1px solid green;padding: 10px;">2nd</td>
        <td style="border:1px solid green;padding: 10px;">Physics-2</td>
          </tr>
      </table>
      </div>
<table style="margin-left:42%; margin-top:20px;">
        <tr>

          <td style="padding:10px;">
            <select name="College_year"  style="width:175px;" required>
                      <option value="" disabled  selected>     Select Year     </option>
                      <option value="first">1st</option>
                      <option value="Second">2nd</option>

                    </td>
          <td align=right style="padding:10px;">
            <select name="month"  style="width:175px;" required>
                      <option value="" disabled  selected>     Select Section     </option>
                      <option value="sec">A</option>
                      <option value="sec">B</option>
                      </td>

        </tr>
        <tr>
          <td colspan="4" align=center>
            <div class="searchbox" align=center style=" margin-top:20px;">
            <span> <input class="submit" type="submit" name="" value="List"> </span>
          </div>
        </td>
        </tr>
        <tr>
      </table>

      <div class="main" style="margin-top:50px; margin-left:37%;">
        <table style="border:3px solid black;border-collapse:collapse;">
        <tr>
          <td  colspan="3" align=center> <h1>Student List</h1></td>
        </tr>
        <tr>
          <td  colspan="3" align=center > <h3>Section : A</h3></td>
        </tr>
        <tr>
          <td style="border:1px solid green; padding: 10px;"><h3>Full Name</h3></td>
          <td style="border:1px solid green;padding: 10px;"><h3>Roll Number</h3> </td>
          <td style="border:1px solid green;padding: 10px;"><h3>CGPA</h3></td>
        </tr>
        <tr>
          <td style="border:1px solid green;padding: 10px;">Abdur Rahman Emon</td>
          <td style="border:1px solid green;padding: 10px;">1001</td>
          <td style="border:1px solid green;padding: 10px;">2.99</td>
          </tr>
        <tr>
            <td style="border:1px solid green;padding: 10px;">Abdul Al Mahmud Riaz</td>
            <td style="border:1px solid green;padding: 10px;">1002</td>
            <td style="border:1px solid green;padding: 10px;">2.98</td>
        </tr>
        <tr>
              <td style="border:1px solid green;padding: 10px;">Khansa Jamil</td>
              <td style="border:1px solid green;padding: 10px;">1003</td>
          <td style="border:1px solid green;padding: 10px;">4.00</td>
            </tr>
            <tr>
                  <td style="border:1px solid green;padding: 10px;">MD. Rakibul Islam</td>
                  <td style="border:1px solid green;padding: 10px;">1003</td>
              <td style="border:1px solid green;padding: 10px;">Beyond Expectation</td>
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
