<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$host = $_POST['host'];
$login = $_POST['login'];
$password = $_POST['password'];
$nameDB = $_POST['nameDB'];
$name = $_POST['name'];
$icon = $_FILES['icon'];
$bg = $_POST['bg'];
$blockBg = $_POST['blockBg'];
$buttonBg = $_POST['buttonBg'];
$textColor = $_POST['textColor'];
$buttonTextColor = $_POST['buttonTextColor'];

$logins = $_POST['logins'];
$passwords = $_POST['passwords'];
$types = $_POST['types'];
$productNames = $_POST['productNames'];
$compounds = $_POST['compounds'];
$images = $_FILES['images'];
$groups = $_POST['groups'];
$prices = $_POST['prices'];

file_put_contents('data/hostDB.txt', $host);
file_put_contents('data/loginDB.txt', $login);
file_put_contents('data/passwordDB.txt', $password);
file_put_contents('data/nameDB.txt', $nameDB);

$link = mysqli_connect($host, $login, $password, $nameDB);
mysqli_query($link, "
CREATE TABLE users
(
  id int(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(1000),
  password INT(255),
  status INT(255)
  )

");
mysqli_query($link, "
CREATE TABLE data
(
  id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(1000),
  bg VARCHAR(1000),
  blockBg VARCHAR(1000),
  buttonBg VARCHAR(1000),
  textColor VARCHAR(1000),
  buttonTextColor VARCHAR(1000)
  )

");
mysqli_query($link, "
CREATE TABLE point
(
  id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  products VARCHAR(1000),
  price INT(255),
  number VARCHAR(1000),
  email VARCHAR(1000),
  status VARCHAR(1000),
  address VARCHAR(1000),
  point VARCHAR(1000),
  carrier VARCHAR(1000)
  )

");
mysqli_query($link, "
CREATE TABLE cart
(
  id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(1000),
  price INT(255),
  number INT(255),
  email VARCHAR(1000)
  )

");
mysqli_query($link, "
CREATE TABLE products
(
  id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(1000),
  price VARCHAR(1000),
  compound VARCHAR(1000),
  image VARCHAR(1000),
  category VARCHAR(1000)
  )

");


mysqli_query($link, "INSERT INTO data (name, bg, blockBg, buttonBg, textColor, buttonTextColor) VALUES ('$name', '$bg', '$blockBg', '$buttonBg', '$textColor', '$buttonTextColor')");

for ($i = 0; $i < count($logins); $i++){
  mysqli_query($link, "INSERT INTO users (id, email, password, status) VALUES (NULL, '$logins[$i]', '$passwords[$i]', '$types[$i]')");
}
for ($i = 0; $i < count($productNames); $i++){
  $imageName = $images['name'][$i];
  $name = basename($images["name"][$i]);
  move_uploaded_file($images['tmp_name'][$i], 'img/products/'.$name);
  mysqli_query($link, "INSERT INTO products (id, name, price, compound, image, category) VALUES (NULL, '$productNames[$i]', '$prices[$i]', '$compounds[$i]', '$imageName', '$groups[$i]')");
}
move_uploaded_file($icon['tmp_name'], 'img/icon.png');
mysqli_close($link);

echo '<script>location="index2.php"</script>'
?>
