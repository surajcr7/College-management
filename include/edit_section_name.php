<?php
session_start();
require "conn.php";

if (isset($_POST['edit_section_name_btn'])) {

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $id = validate($_POST['secton_id']);
  $Name = validate($_POST['section_name']);
  $Year = validate($_POST['section_year']);
  $Limit = validate($_POST['section_limit']);

  if (empty($id) || empty($Name) || empty($Year) || empty($Limit)) {
    header("Location: ../Admin/Section/Edit_Section.php?msg=Something Wrong! Reload and try again!");
    exit();
  }else {

    $mysql_qry = "SELECT * from section where serial='$id'";
    $result = mysqli_query($conn,$mysql_qry);
        if (mysqli_num_rows($result)>0) {
          $mysql_qry1 = "SELECT * from section where section_name='$Name' and year='$Year'";
          $result1 = mysqli_query($conn,$mysql_qry1);
          if (mysqli_num_rows($result1)>0) {
            header("Location: ../Admin/Section/Edit_Section.php?msg=Section name already available!");
            exit();
          }else {
            $sql = "UPDATE section SET section_name='$Name',year='$Year',limt='$Limit' WHERE serial='$id'";
            if ($conn->query($sql) === true){
              header("Location: ../Admin/Section/Edit_Section.php?msg=Updated section info");
              exit();
            }else {
              header("Location: ../Admin/Section/Edit_Section.php?msg=Something Wrong! Try agian!!");
              exit();
            }
          }
        }else {
          header("Location: ../Admin/Section/Edit_Section.php?msg=Something Wrong!");
          exit();
        }
        $conn->close();

  }
}
