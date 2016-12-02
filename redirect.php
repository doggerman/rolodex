<?php


if($_SERVER['REQUEST_METHOD'] === 'POST'){
$valid = true;

$error=[];


  if ($_POST['people']) {
    require'insertToPeople.php';
  }

  if ($_POST['gear']) {
    require'insertToGear.php';
  }

  if ($_POST['socialmedia']) {
    require'insertToSocialMedia.php';
  }

  if ($_POST['accounts']) {
    require'insertToAccounts.php';
  }


}
