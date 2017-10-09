<?php
    session_start();
    
    if (isset($_SESSION['user_id'])) {
           
                $connection = oci_connect ("gq019", "eouytb", "gqiannew2:1521/pdborcl");
        if($connection == false){
            display_oracle_error_message(null);
            die("Failed to connect");
        }

            $sql = "SELECT * FROM users";
            $cursor = oci_parse($connection, $sql);

            if ($cursor == false) {
                display_oracle_error_message($connection);
                oci_close ($connection);
                die("SQL Parsing Failed");
            }

            
            $result = oci_execute($cursor);

            
            if ($result == false) {
              display_oracle_error_message($cursor);
              oci_close ($connection);
              die("SQL execution Failed");
            }
            
            
    
    } else {
        header('Location: index.php');
    }
