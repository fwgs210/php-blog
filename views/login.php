    <?php require_once 'templates/header.tpl.php';?>
    <form action="../controllers/routes.php?action=user_login" method="post">
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

      <button type="submit">Login</button>
    </form>
</body>
</html>




