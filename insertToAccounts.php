<?php
require'app/config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$valid = true;

if ((empty($_POST['handle'])) || (empty($_POST['socialMedia_id'])) || (empty($_POST['people_id'])) || (empty($_POST['profileUrl']))) {
  $valid=false;
  $error['fields']='Fill in all fields.';
}



  $handle = htmlspecialchars($_POST['handle']);
  $profileUrl = htmlspecialchars($_POST['profileUrl']);

  //verify id
  if(is_numeric($_POST['socialMedia_id'])) {
    $socialMedia_id = (int) $_POST['socialMedia_id'];
  } else {
    $error['socialMedia_id']='Somting is wrong with you socialMedia_id.';
    $valid=false;
  }

  //varify id
  if(is_numeric($_POST['people_id'])) {
    $people_id = (int) $_POST['people_id'];
  } else {
    $error['people_id']='Somting is wrong with you people_id.';
    $valid=false;
  }


  if ($valid) {
    $insertIntoPeople = "INSERT INTO accounts (handle, socialMedia_id, people_id, profileUrl) VALUES (:handle, :socialMedia_id, :people_id, :profileUrl );";
  try {

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $peopleStatment = $db->prepare($insertIntoPeople);
      $peopleStatment->bindValue(':handle', $handle);
      $peopleStatment->bindValue(':socialMedia_id', $socialMedia_id);
      $peopleStatment->bindValue(':people_id', $people_id);
      $peopleStatment->bindValue(':profileUrl', $profileUrl);
      $peopleStatment->execute();
      $success['success']='New records created successfully!';
      }
  catch(PDOException $e)
      {
        $error['mysql']= $e->getMessage();
      }
  $db = null;
  $handle = "";
  $socialMedia_id = "";
  $people_id = "";
  $profileUrl = "";


  }
}
