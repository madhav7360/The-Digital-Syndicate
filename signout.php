<?php
session_start();
session_destroy();
session_start();
$_SESSION['message'] =('Logged out')  ;  
                header('Location: Index.php');
                exit;
                ?>