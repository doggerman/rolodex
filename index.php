
<?php
require'app/config.php';
require'app/functions.php';


// TODO:
//Create a private repository (named rolodex) on github and add your code to that repository. Also create a database backup and add this to the repository under a directory called backups then invite me (Johannes) the the repository.
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="assets/css/index.css"/>
    <title></title>
  </head>
  <body>

<header>
  <div class="header-logo">
    <img src="../assets/img/logo.svg" alt="">
  </div>
</header>

<div class="dropDown">
  <img src="../assets/img/meny.png" alt="">
  <div class="dropDown-content">
    <div id="people">People</div>
    <div id="gear">Gear</div>
    <div id="socialmedia">Socialmedia</div>
    <div id="accounts">Accounts</div>
  </div>
</div>
<main>



    <div class="hide hide-people">
      <div class="input people">
        <form method="POST">
          <label>First name:</label><input type="text" name="firstName" value="<?php isset($firstName) ? print $firstName : print ""; ?>"/><br>
          <label>Last name:</label><input type="text" name="lastName" value="<?php isset($lastName) ? print $lastName : print ""; ?>"/><br>
          <label>Email:</label><input type="email" name="email" value="<?php isset($email) ? print $email : print ""; ?>"/><br>
          <label>Cellphone:</label><input type="number" name="phone" value="<?php isset($phone) ? print $phone : print ""; ?>"/><br>
          <input type="submit" value="Register" name="people"/><br>
        </form>
      </div>
    </div>

    <div class="hide hide-gear">
      <div class="input gear">
        <form method="POST">
          <label>Email:</label><select name="peopleId"><?php loopOption($db, "SELECT id, email FROM people;"); ?></select><br>
          <label>Make:</label><input type="text" name="make" value=""/><br>
        <label>Model:</label><input type="text" name="model" value=""/><br>
          <label>Typo:</label><input type="text" name="typo" value=""/><br>
          <input type="submit" value="Register" name="gear" /><br>
        </form>
      </div>
    </div>

    <div class="hide hide-socialmedia">
      <div class="input socialmedia">
        <form method="POST">
          <label>ServiceName:</label><input type="text" name="ServiceName" value=""/><br>
          <label>Url:</label><input type="text" name="url" value=""/><br>
          <input type="submit" value="Register" name="socialmedia" /><br>
        </form>
      </div>
    </div>

    <div class="hide hide-accounts">
      <div class="input accounts">
        <form method="POST">
          <label>Handle:</label><input type="text" name="handle" value=""/><br>
          <label>SocialMedia:</label><select name="socialMedia_id"><?php loopOptionMulti($db, "SELECT id, serviceName FROM socialmedia;", 'id', 'serviceName'); ?></select><br>
          <label>Email:</label><select name="people_id"><?php loopOptionMulti($db, "SELECT id, email FROM people;", 'id', 'email'); ?></select><br>
          <label>ProfileUrl:</label><input type="text" name="profileUrl" value=""/><br>
          <input type="submit" value="Register" name="accounts" /><br>
        </form>
      </div>
    </div>


    <div class="users">
      <p>Select</p>
      <?php loopAtag($db, "SELECT id, email FROM people;", 'id', 'email');?>
    </div>

      <table class="display">
        <tr>
          <th>Id</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Make</th>
          <th>Model</th>
          <th>Typo</th>
          <th>Handle</th>
          <th>ProfileUrl</th>
        </tr>
          <?php
          (!empty($_GET['id'])) ? $id = $_GET['id'] : $id = "";
          loopDisplay($db, "SELECT people.*, gear.make, gear.model, gear.typo, accounts.handle, accounts.profileUrl FROM people LEFT JOIN gear ON people.id= gear.people_id LEFT JOIN accounts ON people.id = accounts.people_id WHERE people.id= '$id';");
          ?>
      </table>

    <?php require'redirect.php'; ?>
    <?php require'massageHandling.php' ?>

</main>
<footer>

  <script src="assets/js/main.js" type="text/javascript"></script>
  <script src="assets/js/functions.js" type="text/javascript"></script>
</footer>


  </body>
</html>
