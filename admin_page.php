<?php
    session_start();
    
    
    if (isset($_SESSION['user_id'])) {
        
        if ($_SESSION['user_type'] == 2 ||
            $_SESSION['user_type'] == 3)
            
        {
            
           
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

            
            echo '<table border="1">';
            
            echo "<tr><th>User ID</th>"
            . "<th>User Type</th>"
            . "<th>Update</th>"
            . "<th>Delete</th>"
            . "<tr>";
            
            
            while (($row = oci_fetch_array($cursor)) != false) {
                
                $userID = $row[0];
                $userType = $row[3];
    
                echo "<tr>";  
                echo "<td>".$userID."</td>";
                
                if ($userType == 1) {
                    echo "<td>Student</td>";
                } else if ($userType == 2) {
                    echo "<td>Admin</td>";
                } else if ($userType == 3) {
                    echo "<td>Student Admin</td>";
                } else {
                    echo "<td></td>";
                }
                
                echo "<td><a href=\"update_user.php?user_id=$userID\">update</a></td>";
                echo "<td><a href=\"delete_user.php?user_id=$userID\">delete</a></td>";
                echo "</tr>";

            }
            
            echo "</table>";
        }
    }

