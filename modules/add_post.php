<?php
$result = $pdo->query("SELECT * FROM categories");
$categories = $result->fetchALL();

if (isset($_POST['title'])) {
  $result = $pdo->prepare('INSERT INTO posts (title, body, category_id) VALUES (:title, :body, :category_id)');
  $result->bindParam(':title', $_POST['title']);
  $result->bindParam(':body', $_POST['body']);
  $result->bindParam(':category_id', $_POST['category_id']);
  $result->execute();

  header('location: index.php?v=posts');
}
?>
<h1>Dodaj Post</h1>
<form method="post">
  <div class="form-group">
    <label>Tytuł</label>
    <input type="text" name="title" class="form-control">
  </div>
  <div class="form-group">
    <label>Treść</label>
    <textarea class="form-control" name="body" cols="30" rows="10"></textarea>
  </div>
  <div class="form-group">
    <label>Kategoria</label>
    <select class="form-control" name="category_id">
      <?php
      foreach($categories as $category) {
        echo '<option value="'. $category["id"] .'">';
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
