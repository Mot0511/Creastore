<?php
$DBdata = [file_get_contents('data/hostDB.txt'), file_get_contents('data/loginDB.txt'), file_get_contents('data/passwordDB.txt'), file_get_contents('data/nameDB.txt')];
$name = $_POST['name'];
$compound = $_POST['compound'];
$image = $_FILES['image']['name'];
$group = $_POST['group'];
$price = $_POST['price'];

move_uploaded_file($_FILES['image']['tmp_name'], 'img/products/'.$image);


$link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
if ($link == false){
  print(mysqli_connect_error());
}
mysqli_set_charset($link, 'utf8');
$res = mysqli_query($link, "INSERT INTO products SET name='".$name."', price='".$price."', compound='".$compound."', image='".$image."', category='".$group."'") or die(mysqli_error($link));

echo '<script>location="admin.php"</script>';
$link->close();

?>
