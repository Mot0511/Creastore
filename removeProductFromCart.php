<?php
$DBdata = [file_get_contents('data/hostDB.txt'), file_get_contents('data/loginDB.txt'), file_get_contents('data/passwordDB.txt'), file_get_contents('data/nameDB.txt')];

  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $id = $_GET['id'];
  $email = $_GET['email'];
  $link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
  if ($link == false){
    print(mysqli_connect_error());
  }
  mysqli_set_charset($link, 'utf8');
  mysqli_query($link, "DELETE FROM cart WHERE id = '".$id."'");
  $res = mysqli_query($link, "SELECT * FROM cart WHERE id = '".$id."'");
  for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

  echo '<script>location="cart.php?email='.$email.'"</script>';
  $link->close();
?>
