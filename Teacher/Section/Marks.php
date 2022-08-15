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
    <a href="Section.php"  >ACTIVE SECTIONS</a>
    <a href="Marks.php"class="active" >UPLOAD MARKS</a>
    </div>
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

          <div class="main" style="margin-top:40px; margin-left:38%;">
            <table style="border:3px solid black;border-collapse:collapse;">
            <tr>
              <td  colspan="4" align=center> <h1>Student List</h1></td>
            </tr>
            <tr>
              <td  colspan="4" align=center > <h3>Section : A</h3></td>
            </tr>
            <tr>
              <td  colspan="4" align=center > <h3>Physics-1</h3></td>
            </tr>
            <tr>
              <td style="border:1px solid green; padding: 10px;"><h3>Full Name</h3></td>
              <td style="border:1px solid green;padding: 10px;"><h3>Roll Number</h3> </td>
              <td style="border:1px solid green;padding: 10px;"><h3>CGPA</h3></td>
              <td style="border:1px solid green;padding: 10px;"><h3>Marks</h3></td>
            </tr>
            <tr>
              <td style="border:1px solid green;padding: 10px;">Abdur Rahman Emon</td>
              <td style="border:1px solid green;padding: 10px;">1001</td>
              <td style="border:1px solid green;padding: 10px;">2.99</td>
              <td style="border:1px solid green;padding: 10px;"><h3> <input style="height:20px;width:65px;" type="number" name="" value=""> </h3></td>
            </tr>
            <tr>
                <td style="border:1px solid green;padding: 10px;">Abdul Al Mahmud Riaz</td>
                <td style="border:1px solid green;padding: 10px;">1002</td>
                <td style="border:1px solid green;padding: 10px;">2.98</td>
            <td style="border:1px solid green;padding: 10px;"><h3> <input style="height:20px;width:65px;" type="number" name="" value=""> </h3></td>
            </tr>
            <tr>
                  <td style="border:1px solid green;padding: 10px;">Khansa Jamil</td>
                  <td style="border:1px solid green;padding: 10px;">1003</td>
                  <td style="border:1px solid green;padding: 10px;">4.00</td>
                  <td style="border:1px solid green;padding: 10px;"><h3> <input style="height:20px;width:65px;" type="number" name="" value=""> </h3></td>
            </tr>
                <tr>
                      <td style="border:1px solid green;padding: 10px;">MD. Rakibul Islam</td>
                      <td style="border:1px solid green;padding: 10px;">1004</td>
                  <td style="border:1px solid green;padding: 10px;">Beyond Expectation</td>
                  <td style="border:1px solid green;padding: 10px;"> <input  style="height:20px;width:65px;" type="number" name="" value=""> </td>
                    </tr>

            </table>
          </div>
              <div class="delete" style="margin-left:50%; margin-top:50px;">
              <input class="submit" type="submit" name="" value="Update" onclick="document.getElementById('dlt').style.display='block'">
            </div>
              <div id="dlt" class="modal">
                <span onclick="document.getElementById('dlt').style.display='none'" class="close" title="Close Modal">&times;</span>
                <form class="modal-content" action="/action_page.php">
                  <div class="container">
                    <h1>Uploaded</h1>
                    </div>
                  </div>
                </form>
              </div>

  </body>
</html>

<?php
}else {
  header("Location: ../../index.php");
  exit();
}
 ?>
