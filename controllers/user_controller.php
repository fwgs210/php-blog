<?php

require '../utilities/connector.php';
require '../models/user.php';

class user_controller {
  // Our create() method will need a parameter to take in the user input
  // This parameter will act as a placeholder for the $_POST array
  public function create_user($data) {
    // We will check to see if our required fields have been filled out
    if (!empty($data['username']) && !empty($data['password']) && !empty($data['email'])) {
      // Then we will create a new instance of our Elephant model and its
      // constructor will take in the $_data placeholder
      $new_user = new user_model($data);
      $username = $new_user->username;
      $password = $new_user->password;
      $email = $new_user->email;
      // Then we will serialize the Elephant object so that we can store it in
      // one column
      // $elephant = serialize($elephant);
      // // When storing serialized objects in a database it is best practice
      // // to use the base64_encode() function to encode the serialized string
      // // so that the data does not get corrupted while it is being transferred
      // // and for added security
      // $elephant = base64_encode($elephant);
      // We will then need to use our connector class' instance getter to get
      // the instance
      $db = connector::get_instance();
      // We will then use the get_pdo() getter method to get the PDO object and
      // store it in a variable
      $pdo = $db->get_pdo();
      // We can then use an INSERT INTO statement and PDO's prepare method to
      // prepare our SQL query to insert the encoded elephant into the
      // object column
      $sql = "INSERT INTO `users` (`username`, `password`, `email`) VALUES ('${username}', '${password}', '${email}');";
      $query = $pdo->prepare($sql);
      // We will use PDO's execute() method to execute the query inside of an if
      // statement to check to see if the query runs successfully
      // if so we will redirect back to the View page
      // else we will redirect back to the Add page
      if($query->execute()) {
        $GLOBALS['authenticated'] = true;
        header('Location: ../views/index.php?login=success');
        exit();
      } else {
        header('Location: ../views/register.php?db=error');
        exit();
      }
      // If the required fields have not been filled out redirect back to
      // add page with an error message
    } 
  } // end create()

  // The read() method will be used to retreive data from the database
  public function login($data) {
    $db = connector::get_instance();
    $pdo = $db->get_pdo();
    $sql = "SELECT * FROM `users`";
    $query = $pdo->prepare($sql);
    $query->execute();
    // To store the databases as an array we need to use PDO's fetchAll method
    // and save it as a variable
    $all_users = $query->fetchAll();
    $user = false;
    $new_user = new user_model($data);
    $username = $new_user->username;
    $password = $new_user->password;
    // Because we use dthe base64_encode() function to encode our serialized
    // objects we must use the base64_decode() function to decode it
    // Because we used the serialize() function to convert our object into
    // a serialized string we must use the unserialize() function to convert it
    // back to its initial format
    foreach ($all_users as $key => $user_row) {
      $user_name = $user_row['username'];
      $user_password = $user_row['password'];
      if ($user_name === $username && $user_password === $password) {
        header('Location: ../views/index.php?login=success');
      } else {
        header('Location: ../views/login.php?login=failed');
      }
    }
  } // end read()


  // The read() method will be used to retreive data from the database
  public function read() {
    $db = connector::get_instance();
    $pdo = $db->get_pdo();
    $sql = "SELECT * FROM `users`";
    $query = $pdo->prepare($sql);
    $query->execute();
    // To store the databases as an array we need to use PDO's fetchAll method
    // and save it as a variable
    $users = $query->fetchAll();
    // Because we use dthe base64_encode() function to encode our serialized
    // objects we must use the base64_decode() function to decode it
    // Because we used the serialize() function to convert our object into
    // a serialized string we must use the unserialize() function to convert it
    // back to its initial format
    // foreach ($elephants as $elephant_num => $user_row) {
    //   $an_elephant = base64_decode($user_row['object']);
    //   $an_elephant = unserialize($an_elephant);
    //   $elephants[$elephant_num]['object'] = $an_elephant;
    // }
    return $users;
  } // end read()
}