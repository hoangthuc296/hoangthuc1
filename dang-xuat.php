<?php
    session_start();
    session_unset();

//    setcookie("admin","",time()-3600);
//    setcookie("pass","",time()-3600);
    header('Location: index.php');
 ?>