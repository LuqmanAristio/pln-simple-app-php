<?php
session_start();
session_destroy();

echo "<script>alert('Sampai Jumpa');
location.href='index.php';</script>";

?>