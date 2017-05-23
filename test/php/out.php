<?php 
session_start();
//登出
unset($_SESSION['uid']);
unset($_SESSION['username']);
unset($_SESSION['policy']);
session_destroy();
echo "<script>location.href='../login.php'</script>";
?>