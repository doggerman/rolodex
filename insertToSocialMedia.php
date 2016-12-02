<?php
include'app/config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$valid = true;

if ((empty($_POST['ServiceName'])) || (empty($_POST['url']))) {
  $valid=false;
  $error['fields']='Fill in all fields.';
}



  $ServiceName = htmlspecialchars($_POST['ServiceName']);
  $url = htmlspecialchars($_POST['url']);

  if ($valid) {
    $insertIntoPeople = "INSERT INTO socialmedia (ServiceName, url) VALUES (:ServiceName, :url );";
  try {

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $peopleStatment = $db->prepare($insertIntoPeople);
      $peopleStatment->bindValue(':ServiceName', $ServiceName);
      $peopleStatment->bindValue(':url', $url);
      $peopleStatment->execute();
      $success['success']='New records created successfully!';
      }
  catch(PDOException $e)
      {
        $error['mysql']= $e->getMessage();
      }
  $db = null;
  $ServiceName = "";
  $url = "";

  }
}
