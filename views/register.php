    <?php require_once 'templates/header.tpl.php';?>
  <form action="../controllers/routes.php?action=add_user" method="post">
      <label for="username">username:</label>
      <!--
      Make sure to include an input with a name attribute which is equal to "name" to take in a name
      -->
      <input type="text" name="username" value="" id="username">

      <label for="password">password:</label>
      <!--
      And an input with a name attribute which is equal to "age" to take in an age
      -->
      <input type="text" name="password" value="" id="password">

      <label for="email">email:</label>
      <!--
      And an input with a name attribute which is equal to "age" to take in an age
      -->
      <input type="email" name="email" value="" id="email">

      <button type="submit">create account</button>
    </form>
</body>
</html>
