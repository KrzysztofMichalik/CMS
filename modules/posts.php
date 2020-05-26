<h1>Posty</h1>
<a class='btn btn-primary' href="index.php?v=add_post">Dodaj post</a>
<?php
$result = $pdo->query("SELECT posts.*, categories.name FROM posts LEFT JOIN categories ON posts.category_id = categories.id");
$posts = $result->fetchALL();
?>

<table class="table table-hover">
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Category</th>
    <th>Body</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php
  foreach ($posts as $post) {
    ?>
    <tr>
    <td><?php echo $post['id'] ?></td>
    <td><?php echo $post['title'] ?></td>
    <td><?php echo $post['name'] ?></td>
    <td><?php echo $post['category_id'] ?></td>
    <td><?php echo $post['body'] ?></td>
    <td>
      <a href="index.php?v=edit_post&id=<?php echo $post['id'];?>" class="btn btn-success">Edit</a>
    </td>
    <td>
      <a href="index.php?v=delete_post&id=<?php echo $post['id'];?>" class="btn btn-danger">Delete</a>
    </td>
  </tr>
    <?php
  }
   ?>
</table>
