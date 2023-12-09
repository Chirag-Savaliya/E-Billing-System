<?php
    session_start();
    session_destroy();
    echo"<script>window.location.replace('http://localhost/E-Billing System/Index.php');</script>";
?>