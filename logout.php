<?php
session_start();
session_destroy();
session_reset();
header("Location:index.php?message=logout");
?>