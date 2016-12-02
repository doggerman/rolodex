<?php
include'app/config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$valid = true;

if ((empty($_POST['peopleId'])) || (empty($_POST['make'])) || (empty($_POST['model'])) || (empty($_POST['typo']))) {
  $valid=false;
  $error['fields']='Fill in all fields.';
}



  $make = htmlspecialchars($_POST['make']);
  $model = htmlspecialchars($_POST['model']);
  $typo = htmlspecialchars($_POST['typo']);

  //varify phone Number
  if(is_numeric($_POST['peopleId'])) {
    $people_id = (int) $_POST['peopleId'];
  } else {
    $error['peopleId']='Somting is wrong with you people_id.';
    $valid=false;
  }



  if ($valid) {
    $insertIntoPeople = "INSERT INTO gear (people_id, make, model, typo) VALUES (:people_id, :make, :model, :typo );";
  try {

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $peopleStatment = $db->prepare($insertIntoPeople);
      $peopleStatment->bindValue(':people_id', $people_id);
      $peopleStatment->bindValue(':make', $make);
      $peopleStatment->bindValue(':model', $model);
      $peopleStatment->bindValue(':typo', $typo);
      $peopleStatment->execute();
      $success['success']='New records created successfully!';
      }
  catch(PDOException $e)
      {
        $error['mysql']= $e->getMessage();
      }
  $db = null;
  $people_id = "";
  $make = "";
  $model = "";
  $typo = "";
  }
}
