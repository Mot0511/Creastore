<?php
setcookie('login', '', time() + 1, '/');
setcookie('pass', '', time() + 1, '/');
echo '<script>location="index.php"</script>';
?>
