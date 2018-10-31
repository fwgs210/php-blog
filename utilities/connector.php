<?php

class connector {
  private static $instance = null;
  private $pdo;
  private $db_host;
  private $db_name;
  private $db_user;
  private $db_password;

  private function __construct() {
    $this->db_host = "localhost";
    $this->db_name = "blogs";
    $this->db_user = "root";
    $this->db_password = "root";
    $this->pdo = new PDO(
      'mysql:host=' . $this->db_host .
      ';dbname=' . $this->db_name,
      $this->db_user,
      $this->db_password
    );
  }
  public static function get_instance() {
    if (self::$instance == null) {
      self::$instance = new connector();
    }
    return self::$instance;
  }
  public function get_pdo() {
    return $this->pdo;
  }
}