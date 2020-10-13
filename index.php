<?php
require_once 'connec.php';

if(isset($_POST['submit']) && $_POST['submit']=='submit'){
    $query = 'INSERT INTO friend VALUES (null, :firstname, :lastname)';
    $statement=$pdo->prepare($query);
    $statement->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
    $statement->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
    $statement->execute();

  header('Location: index.php');
  exit();
}

$friends = $pdo->query('SELECT * FROM friend')->fetchAll();
  foreach($friends as $friend) {
      echo '<li>'.$friend['firstname'] . ' ' . $friend['lastname'].'</li>';
    }
?>

<form action=""  method="POST" class="form">
  <div class="form">
    <label for="firstname">Firstname: </label>
    <input type="text" name="firstname" id="firstname">
  </div>
  <div class="form">
    <label for="lastname">Lastname: </label>
    <input type="text" name="lastname" id="lastname">
  </div>
  <div class="form">
    <input type="submit" name="submit" value="submit">
  </div>

</form>
