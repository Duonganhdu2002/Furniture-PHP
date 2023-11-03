<?php
session_start();

$_SESSION["cart"] = array();

header("Location: ../../index.php?pid=8");
exit();
?>
