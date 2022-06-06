<?php
  $DBdata = [file_get_contents('data/hostDB.txt'), file_get_contents('data/loginDB.txt'), file_get_contents('data/passwordDB.txt'), file_get_contents('data/nameDB.txt')];

  $name = $_GET['name'];
  $email = $_GET['email'];
  $price = $_GET['price'];

  $link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $cartProducts_res = mysqli_query($link, "SELECT * FROM cart WHERE email = '".$email."' AND name = '".$name."'");
  for ($cartProducts = []; $row = mysqli_fetch_assoc($cartProducts_res); $cartProducts[] = $row);

  $count = $cartProducts[0]['number'];

  if ($cartProducts == []){
    $res = mysqli_query($link, "INSERT INTO cart SET name = '".$name."', price = ".$price.", number = 1, email = '".$email."'");
    echo '<script>location="index.php"</script>';
  }
  else{
    mysqli_query($link, "DELETE FROM cart WHERE id = '".$cartProducts[0]['id']."'");
    $count = $count + 1;
    mysqli_query($link, "INSERT INTO cart SET id = '".$cartProducts[0]['id']."', name = '".$name."', price = '".$price."', number = ".$count.", email = '".$email."' ");
    echo '<script>location="cart.php?email='.$email.'"</script>';
  }


  $link->close();
?>
