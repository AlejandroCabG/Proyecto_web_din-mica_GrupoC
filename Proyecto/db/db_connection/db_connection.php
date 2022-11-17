<?php
    class Connection {
        public static function connect ($db_config) {
            require_once ($_SERVER['DOCUMENT_ROOT'].'/db/config/config.php');
            try {
                $connection = new PDO('mysql:host=' . $db_config['host'] . ';dbname=' . $db_config['dbname'],
                    $db_config['username'], $db_config['password']);
                return $connection;
            } catch (PDOException $e) {
                return false;
            }
        }
    }