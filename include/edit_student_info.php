<?php
session_start();
require "conn.php";

if (isset($_POST['edit_info_btn'])) {

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $id = validate($_POST['id']);
  $username = validate($_POST['username']);
  $fullName = validate($_POST['full_name']);
  $birthdate = validate($_POST['birthdate']);
  $family_contact = validate($_POST['family_contact']);
  $gender = validate($_POST['gender_type']);
  $address = validate($_POST['address']);
  $father_name = validate($_POST['father_name']);
  $mother_name = validate($_POST['mother_name']);
  $college_year = validate($_POST['college_year']);

  if (empty($username) || empty($id) || empty($fullName)|| empty($birthdate)|| empty($family_contact)|| empty($gender)
  || empty($address)|| empty($father_name) || empty($mother_name) || empty($college_year)) {
    header("Location: ../Admin/Student/Edit_Student.php?msg=Empty Field Not Allow!");
    exit();
  }else {

    $mysql_qry = "SELECT * from student where Id='$id' AND username ='$username'";
    $result = mysqli_query($conn,$mysql_qry);
        if (mysqli_num_rows($result)>0) {

          $sql = "UPDATE student SET name='$fullName',dob='$birthdate',contact='$family_contact',gender='$gender',address='$address',f_name='$father_name',m_name='$mother_name',c_year='$college_year' WHERE Id='$id' AND username ='$username'";
          if ($conn->query($sql) === true){
            header("Location: ../Admin/Student/Edit_Student.php?msg=Updated User info");
            exit();
          }else {
            header("Location: ../Admin/Student/Edit_Student.php?msg=Something Wrong! Try agian!s");
            exit();
          }
        }else {
          header("Location: ../Admin/Student/Edit_Student.php?msg=Something Wrong!");
          exit();
        }
        $conn->close();

  }
}
