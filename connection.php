<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        
		self::$instance = new PDO("oci:dbname=ConDr;host=localhost/xe",'MADALINA','MADALINA');
      }
      return self::$instance;
    }
  }
?>