<?php

class user_model {
  public $username;
  public $password;
  public $email;

  // In orer to keep our properties encapsulated we will want to use private
  // or protected properties with getter and setters
  public function __construct(array $input_values) {
    $this->set_username($input_values['username']);
    $this->set_password($input_values['password']);
    if (!empty($input_values['email'])) {
    	$this->set_email($input_values['email']);
    }
  }
  // The __get() magic method is used as a universal getter method which gets
  // the value of any private or protected property
  // Like __construct() it is not necessary to call the __get() method so you
   // can use private and protected properties as if they are public
   // public function __get($property) {
   //   if (property_exists($this, $property)) {
   //     return $this->property;
   //   }
   // }
   // There is also a __set() method but we won't use that as we want to do
   // unique sanitization and validation for each of our properties using
   // custom setters
   public function set_username(string $value) {
     $this->username = $value;
   }
   public function set_password(string $value) {
     $this->password = $value;
   }
   public function set_email(string $value) {
     $this->email = $value;
   }
}