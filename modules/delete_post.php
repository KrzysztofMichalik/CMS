<?php
$is_exist = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
$is_exist->bindParam(':id', $_GET['id']);
$is_exist->execute();
$result = $is_exist->fetch();

if (!isset($_GET['id']) || $result === false) {
  header('location: index.php?v=posts');
}
?>

<form method="post">

  <label>STOP CZY NA PEWNO CHCESZ USUNĄĆ POST?</label>
  <input type="submit" name='btn-yes' value='yes' class='btn btn-primary'></button>
  <input type="submit" name='btn-no' value='no' class='btn btn-danger'></button>

</form>

<?php

if (isset($_POST['btn-yes'])) {
  $result = $pdo->prepare('DELETE FROM posts WHERE id = :id');
  $result->bindParam(':id', $_GET['id']);
  $result->execute();
  header('location: index.php?v=posts');
} elseif(isset($_POST['btn-no'])) {
header('location: index.php?v=posts');
}
