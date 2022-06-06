<?php
$DBdata = [file_get_contents('data/hostDB.txt'), file_get_contents('data/loginDB.txt'), file_get_contents('data/passwordDB.txt'), file_get_contents('data/nameDB.txt')];

$id = $_GET['id'];

$link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
if ($link == false){
  print(mysqli_connect_error());
}
mysqli_set_charset($link, 'utf8');
$res = mysqli_query($link, "DELETE FROM products WHERE id=".$id."") or die(mysqli_error($link));

echo '<script>location="admin.php"</script>';
$link->close();

?>
