<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Teacher</title>
    <link rel="stylesheet" href="Notice.css">
  </head>
  <body>
    <div class="sidebar">
      <header>Welcome</header>
      <a href="../index.php" >
        <i class=""></i>
        <span>COURSES</span>
      </a>
      <a href="../Section/Section.php">
        <i class=""></i>
        <span>SECTION</span>
      </a>
      <a href="../Notice/Notice.php"  class="active" >
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
                <span> <input class="submit" type="submit" name="" value="Show"> </span>
              </div>
            </td>
          </tr>
        </table>
        <textarea style="margin-left:42%;margin-top:50px;" name="comment" id="" cols="50" rows="6"></textarea>

        <div class="delete" style="margin-left:48%; margin-top:50px;">
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

        <?php
        }else {
          header("Location: ../../index.php");
          exit();
        }
         ?>
