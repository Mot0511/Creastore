<?php
$DBdata = [file_get_contents('data/hostDB.txt'), file_get_contents('data/loginDB.txt'), file_get_contents('data/passwordDB.txt'), file_get_contents('data/nameDB.txt')];

  $status = $_GET['status'];
  $id = $_GET['id'];
  $products = $_GET['products'];
  $number = $_GET['number'];
  $email = $_GET['email'];
  $page = $_GET['page'];
  $address = $_GET['address'];
  $price = $_GET['price'];
  $point = $_GET['point'];
  $carrier = $_GET['carrier'];
  $points = [];
  $ppoints = [];
  $numberPoints = 0;
  $numberInPoints = [];

  $link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  mysqli_query($link, "DELETE FROM point WHERE id = '".$id."'");
  if ($status == 2){
    $ppoint_res = mysqli_query($link, "SELECT carrier FROM point");
    for ($ppoint = []; $row = mysqli_fetch_assoc($ppoint_res); $ppoint[] = $row);

    $point_res = mysqli_query($link, "SELECT email FROM users WHERE status = 3");
    for ($point1 = []; $row = mysqli_fetch_assoc($point_res); $point1[] = $row);

    foreach ($ppoint as $i){
      array_push($ppoints, $i['carrier']);
    }

    foreach ($point1 as $i){
      array_push($points, $i['email']);
    }

    foreach ($points as $i){
      foreach ($ppoints as $j){
        if ($i == $j){
          $numberPoints++;
        }
      }
      $numberInPoints += [$i => $numberPoints];
      $numberPoints = 0;
    }

    asort($numberInPoints);
    mysqli_query($link, "INSERT INTO point SET products = '".$products."', price = ".$price.", number = '".$number."', email = '".$email."', status = '".$status."', address = '".$address."', point = '".$point."', carrier = '".array_key_first($numberInPoints)."'");
  }
  else if ($status >= 2 and $status != 3){
    $res = mysqli_query($link, "SELECT carrier FROM point WHERE id = '".$id."'");
    for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

    mysqli_query($link, "INSERT INTO point SET products = '".$products."', price = ".$price.", number = '".$number."', email = '".$email."', status = '".$status."', address = '".$address."', point = '".$point."', carrier = '".$carrier."'");
    echo 2;
  }
  else{
    mysqli_query($link, "INSERT INTO point SET products = '".$products."', price = ".$price.", number = '".$number."', email = '".$email."', status = '".$status."', address = '".$address."', point = '".$point."'");
    echo 3;
  }

  echo '<script>location="'.$page.'.php?noList[]='.$noList.'"</script>';

?>
