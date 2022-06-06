<?php
$DBdata = [file_get_contents('data/hostDB.txt'), file_get_contents('data/loginDB.txt'), file_get_contents('data/passwordDB.txt'), file_get_contents('data/nameDB.txt')];

  $id = $_GET['id'];

  $link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
  mysqli_query($link, "DELETE FROM point WHERE id = '".$id."'");
  echo '<script>location="profile.php"</script>';
?>
