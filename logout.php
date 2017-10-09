<?php
    session_start();

    if (isset($_SESSION['user_id'])) {
        
    //clear session;
    session_unset();
    session_destroy();
    
    echo "redirect user to index.php";
    header('Location: http://cs2.uco.edu/~gq019/Project1/index.php');
    exit();
    }

