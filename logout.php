<?php
    session_destroy();
    session_unset();
   echo '<script>window.location.href = "./index.php";</script>';
    
?>