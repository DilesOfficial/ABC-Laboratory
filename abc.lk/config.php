
<?php
    
        $server_name = "localhost";
        $user_name = "root";
        $password = "";
        $database = "myabc";

        $connection = new mysqli($server_name, $user_name, $password, $database);

        if ($connection->connect_error) {
            die("Connection error");
        }else{
            echo "Connection ok ";
        }

?>