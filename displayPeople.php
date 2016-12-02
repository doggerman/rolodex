<?php
include'config.php';

$selectPeople = <<<EOT
Select * FROM people;
EOT;

try {
  $select = $db->prepare($selectPeople);
  $select->execute();
  $result = $select->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die(sprintf("Something went wrong when executing query. Reason: %s", $e->getMessage()));
}

// print_r($result);

foreach ($result as $outputFromTable) {
echo '<tr>';
echo '<td>'.$outputFromTable['id'].'</td>';
echo '<td>'.$outputFromTable['email'].'</td>';
echo '<td>'.$outputFromTable['phone'].'</td>';
echo '<td>'.$outputFromTable['firstName'].'</td>';
echo '<td>'.$outputFromTable['lastName'].'</td>';
echo '</tr>';
}
