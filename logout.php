<?php
session_start();

session_destroy();

header('Location: http://www.greenmag.co.uk/index.php');
?>