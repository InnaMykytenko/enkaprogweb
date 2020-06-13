<?php
if(isset($_GET['exit'])) {
    session_start();
    session_destroy();
    header('Location: index.php');
    exit();
}
