<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $user_id = $_POST['username'];
        $password = $_POST['password'];
        
        
        echo "<p>username: $user_id</p>";
        echo "<p>password: $password</p>";
        
        $connection = oci_connect ("gq019", "eouytb", "gqiannew2:1521/pdborcl");
        if($connection == false){
        display_oracle_error_message(null);
        die("Failed to connect");
    }

    $sql = "SELECT * FROM users where user_id='$user_id'";
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

  $passwordFromDB = "";
  while (($row = oci_fetch_row($cursor)) != false) {
    $userID = $row[0];
    $passwordFromDB= $row[1]; // Get the hash password from the DB
    $userType = $row[3];
    
  }
  
  echo "<p>user type: $userType</p>";
  
  if (password_verify($password, $passwordFromDB)) {
      
      session_start();
      $_SESSION['user_id'] = $userID;
      $_SESSION['user_type'] = $userType;
      
      
      
      
      // If its a student
      if ($userType == 1) {
          header('Location: http://cs2.uco.edu/~gq019/Project1/student_page.php');
      } else if ($userType == 2) {
          header('Location: http://cs2.uco.edu/~gq019/Project1/admin_page.php');
      } else if ($userType == 3) {
          header('Location: http://cs2.uco.edu/~gq019/Project1/student_admin_page.php');
      }
      
      
      
  } else {
      echo "<p>Invalid login</p>";
  }
  
  oci_close ($connection);  
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        
        <div>
            
            
            <form action="index.php" method="post">
                
                <label>
                    Username:
                </label>
                <input type="text" maxlength="20" name="username"/>
                
                
                <label>
                    Password:
                </label>
                <input type="password" maxlength="20" name="password"/>
                
                <p>
                    <input type="submit" name="submit" value="Login"/>
                </p>
                
            </form>
            
        </div>
            
        
    </body>
    
</html>

