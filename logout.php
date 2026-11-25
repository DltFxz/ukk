<?php
// ini yang paling ezz untuk logout dari session atau setelah login 
    session_start();
    session_destroy();
    header("Location: index.php");
?>