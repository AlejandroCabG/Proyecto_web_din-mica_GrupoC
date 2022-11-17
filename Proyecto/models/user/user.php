<?php
    require_once ($_SERVER['DOCUMENT_ROOT'].'/db/db_connection/db_connection.php');
    class User {
        private $connection;

        public function __construct() {
            global $db_config;
            $this->connection = Connection::connect($db_config);
        }

        public function insertNewUser($username, $surnames, $password, $mail): bool {
            return $this->connection->query('
                INSERT INTO aecProyecto_user VALUES ("' . $username . '", "' . $surnames . '", "' . $password . '", "' . $mail . '",
                 FALSE);
            ');
        }
    }
