<?php 
session_start();

session_unset();
session_destroy();

header("Location: /4000/EP/index.php");