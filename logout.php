<?php
session_start();
session_unset();    // all session variabal close
session_destroy(); 


header("Location: index.php");
exit();
?>