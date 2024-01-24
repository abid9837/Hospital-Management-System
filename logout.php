<?php
session_start();

session_destroy();
header("Location: http://localhost/my%20hospital/");
die();

?>