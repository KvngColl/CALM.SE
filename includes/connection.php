<?php

    class Database {
        private $conn;
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $db_name = "bright_idea";

        public function connect() {
            // Create connection
            $conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            else {
                return $conn;
            }
        }
    }

?>