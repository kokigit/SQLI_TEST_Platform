<?php

/**
 * Created by PhpStorm.
 * User: Kokila
 * Date: 12/24/15
 * Time: 11:50 AM
 */


class Database {

    private $_connection;
    private static $_instance; //The single instance
    private $_host = ['host'];
    private $_username = "kokila";
    private $_password = "my123";
    private $_database = "SQLITEST";
    /*
    Get an instance of the Database
    @return Instance
    */
    public static function getInstance() {
        if(!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    // Constructor
    private function __construct() {
        $conf = include "config.php";
        $this->_host = $conf['host'];
        $this->_username = $conf['username'];
        $this->_password = $conf['password'];
        $this->_database = $conf['database'];

        $this->_connection = new mysqli($this->_host, $this->_username,
            $this->_password, $this->_database);

        if($this->_connection->connect_errno){
            $this->_connection = new mysqli($this->_host, $this->_username,
                $this->_password);
            if(!isset($_GET['noError'])) {
                ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>No Database found !</strong> First you have to setup your testing database..
                    <a href="?page=setup">Run Database Setup Script</a>
                </div>
                <?php
            }
        }

        // Error handling
        if(mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
                E_USER_ERROR);
        }
    }
    // Magic method clone is empty to prevent duplication of connection
    private function __clone() { }
    // Get mysqli connection
    public function getConnection() {
        return $this->_connection;
    }
}
?>