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
  $birthdate = validate($_POST['date']);
  $contact = validate($_POST['contact']);
  $email = validate($_POST['email']);
  $gender = validate($_POST['gender_type']);
  $address = validate($_POST['address']);
  $dept= validate($_POST['dept_type']);

  if (empty($username) || empty($id) || empty($fullName)|| empty($birthdate)|| empty($contact)|| empty($email)
  || empty($address)|| empty($dept)|| empty($gender)) {
    header("Location: ../Admin/Teacher/Edit_Teacher.php?msg=Something Wrong! Reload and try again!");
    exit();
  }else {

    $mysql_qry = "SELECT * from teacher where id='$id' AND username ='$username'";
    $result = mysqli_query($conn,$mysql_qry);
        if (mysqli_num_rows($result)>0) {

          $sql = "UPDATE teacher SET name='$fullName',dob='$birthdate',contact='$contact',email='$email',gender='$gender',address='$address',dept='$dept' WHERE id='$id' AND username ='$username'";
          if ($conn->query($sql) === true){
            header("Location: ../Admin/Teacher/Edit_Teacher.php?msg=Updated User info");
            exit();
          }else {
            header("Location: ../Admin/Teacher/Edit_Teacher.php?msg=Something Wrong! Try agian!s");
            exit();
          }
        }else {
          header("Location: ../Admin/Teacher/Edit_Teacher.php?msg=Something Wrong!");
          exit();
        }
        $conn->close();

  }
}
