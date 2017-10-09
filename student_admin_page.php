<?php
session_start();


if (isset($_SESSION['user_id'])) {
    
    if ($_SESSION['user_type'] == 3) {
        echo "student page <br/>";
        
        echo '<a href="admin_page.php">admin page</a><br/>';
    }
}

echo '<a href="logout.php" >Logout</a>';
echo "hello student admin";