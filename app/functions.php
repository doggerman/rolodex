<?php

//select single line from db
function selectSingleInDB($db, $query){
  $questions = $db->query("$query;");
  return $questions->fetchColumn();
}

//select multiply lines from db
function selectMultiInDB($db, $query){
  $questions = $db->query("$query;");
  return $questions->fetchAll();
}

function loopOption($db, $query){
  foreach (selectMultiInDB($db, $query) as $result) {
    print '<option value="'.$result['id'].'">'.$result['email'].'</option>';
  }
return;
}

function loopOptionMulti($db, $query, $one, $two){
  foreach (selectMultiInDB($db, $query) as $result) {
    print '<option value="'.$result[$one].'">'.$result[$two].'</option>';
  }
return;
}

function loopAtag($db, $query, $one, $two){
  foreach (selectMultiInDB($db, $query) as $result) {
    print '<div><a href=?id='.$result[$one].'>'.$result[$two].'</a></div>';
  }
return;
}

function loopDisplay($db, $query){
    print '<table class="display">';
      print '</tr>';
        print '<th>Id</th>';
        print '<th>Email</th>';
        print '<th>Phone</th>';
        print '<th>Firstname</th>';
        print '<th>Lastname</th>';
        print '<th>Make</th>';
        print '<th>Model</th>';
        print '<th>Typo</th>';
        print '<th>Handle</th>';
        print '<th>ProfileUrl</th>';
      print '</tr>';

  foreach (selectMultiInDB($db, $query) as $result) {
      print '<tr>';
        print '<td>'.$result['id'].'</td>';
        print '<td>'.$result['email'].'</td>';
        print '<td>'.$result['phone'].'</td>';
        print '<td>'.$result['firstName'].'</td>';
        print '<td>'.$result['lastName'].'</td>';
        print '<td>'.$result['make'].'</td>';
        print '<td>'.$result['model'].'</td>';
        print '<td>'.$result['typo'].'</td>';
        print '<td>'.$result['handle'].'</td>';
        print '<td>'.$result['profileUrl'].'</td>';
      print '</tr>';
  }
    print '</table>';
return;
}

function verifyEmail($db, $email) {
  return selectMultiInDB($db, "SELECT email FROM people WHERE email='$email';");
}
