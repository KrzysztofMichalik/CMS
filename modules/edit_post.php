<?php

if (isset($_POST['title'])) {
  $result = $pdo->prepare('UPDATE posts SET title = :title, body = :body, category_id = :category_id WHERE id = :id');
  $result->bindParam(':title', $_POST['title']);
  $result->bindParam(':body', $_POST['body']);
  $result->bindParam(':category_id', $_POST['category_id']);
  $result->bindParam(':id', $_GET['id']);
  $result->execute();
  header('location: index.php?v=posts');
}

if(!isset($_GET['id'])) {
  header('location: index.php?v=posts');
}

$result = $pdo->prepare('SELECT * FROM categories');
$result->execute();
$categories = $result->fetchAll();

$result = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
$result->bindParam(':id', $_GET['id']);
$result->execute();
$post = $result->fetch();

var_dump($post);

?>
<h1>Edytowanie posta<h1>
<form method="post">
  <div class="form-group">
    <label>Tytuł posta </label>
    <input type="text" name="title" value="<?php echo $post['title'];  ?>" class="form-control">
  </div>

  <div class="form-group">
    <label>Treść</label>
    <textarea class="form-control" name="body" cols="30" rows="10"><?php echo $post['body']; ?></textarea>
  </div>

  <div class="form-group">
    <label>Kategoria</label>
    <select class="form-control" name="category_id">
      <?php
      foreach($categories as $category) {
        if ($post['category_id'] == $category['id']) {
          echo '<option selected value="'. $category["id"] .'">';
        } else {
          echo '<option value="'. $category["id"] .'">';
        }
        echo $category['name'];
        echo '</options>';
      }
      ?>

    </select>
  </div>

  <div class="form-group">
    <button class="btn btn-primary">Zapisz</button>
  </div>
</form>
