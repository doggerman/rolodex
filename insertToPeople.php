<?php
include'app/config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$valid = true;

if ((empty($_POST['firstName'])) || (empty($_POST['lastName'])) || (empty($_POST['email'])) || (empty($_POST['phone']))) {
  $valid=false;
  $error['fields']='Fill in all fields.';
  // print "fill in all fields";
}



  $firstName = htmlspecialchars($_POST['firstName']);
  $lastName = htmlspecialchars($_POST['lastName']);
  //varify email
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
    $email = htmlspecialchars($_POST['email']);
  } else {
    $error['email']='Somting is wrong with you email.';
    $valid=false;
  }

  if (!empty(verifyEmail($db, $email))) {
    $error['email']='Your email is taken.';
    $valid=false;
  }

  //varify phone Number
  if(is_numeric($_POST['phone'])) {
    $phone = (int) $_POST['phone'];
  } else {
    $error['phone']='Somting is wrong with you phone number.';
    $valid=false;
  }



  if ($valid) {
    $insertIntoPeople = "INSERT INTO people (email, phone, firstName, lastName) VALUES (:email, :phone, :firstName, :lastName );";
  try {

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $peopleStatment = $db->prepare($insertIntoPeople);
      $peopleStatment->bindValue(':email', $email);
      $peopleStatment->bindValue(':phone', $phone);
      $peopleStatment->bindValue(':firstName', $firstName);
      $peopleStatment->bindValue(':lastName', $lastName);
      $peopleStatment->execute();
      $success['success']='New records created successfully!';



      $email = "";
      $phone = "";
      $firstName = "";
      $lastName = "";
      }
  catch(PDOException $e)
      {
        $error['mysql']= $e->getMessage();
      }
  $db = null;


  }
}
