
  <?php require_once 'templates/header.tpl.php'; ?>

  <?php 
    $controller = new user_controller;

    $users = $controller->read();

   ?>

    <h1>Home page</h1>
      <?php
      foreach ($users as $key => $value) {
      ?>
        <p>
        used id: <?php echo $value['user_id']; ?> <br/>
        username: <?php echo $value['username']; ?> <br/>
        password: <?php echo $value['password']; ?> <br/>
        email: <?php echo $value['email']; ?>
        </p>
      <?php
        }
      ?>

    <form action="../controllers/routes.php?action=create_article" method="post">
      <label for="article_title">Article Title:</label>
      <input type="text" name="article_title" value="" id="article_title">

      <label for="article_body">Article Body:</label>
      <textarea name="article_body" value="" id="article_body">
      </textarea>

      <label for="article_author">Author:</label>
      <p id="author">test</p>

      <button type="submit">Post New Article</button>
    </form>
</body>
</html>




