<?php
  $DBdata = [file_get_contents('data/hostDB.txt'), file_get_contents('data/loginDB.txt'), file_get_contents('data/passwordDB.txt'), file_get_contents('data/nameDB.txt')];
  $noList = $_GET['noList'];
  $newPointToList = $_GET['newPointToList'];
  $points = [];
  $ppoints = [];
  $numberPoints = 0;
  $numberInPoints = [];
  $status = $_GET['status'];
  $id = $_GET['id'];
  $products = $_GET['products'];
  $number = $_GET['number'];
  $email = $_GET['email'];
  $page = $_GET['page'];
  $address = $_GET['address'];
  $price = $_GET['price'];
  $id = $_GET['id'];
  $thisPoint = $_GET['point'];


  array_push($noList, $newPointToList);

  $link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  $ppoint_res = mysqli_query($link, "SELECT carrier FROM point");
  for ($ppoint = []; $row = mysqli_fetch_assoc($ppoint_res); $ppoint[] = $row);

  $point_res = mysqli_query($link, "SELECT email FROM users WHERE status = 3");
  for ($point = []; $row = mysqli_fetch_assoc($point_res); $point[] = $row);

  foreach ($ppoint as $i){
    array_push($ppoints, $i['point']);
  }

  foreach ($point as $i){
    array_push($points, $i['email']);
  }

  $ppoints = array_diff($ppoints, $noList);
  $points = array_diff($points, $noList);

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

print_r($numberInPoints);
mysqli_query($link, "DELETE FROM point WHERE id = '".$id."'");

mysqli_query($link, "INSERT INTO point SET products = '".$product."', price = ".$price.", number = '".$number."', email = '".$email."', status = 0, address = '".$address."', point='".$thisPoint."', carrier = '".array_key_first($numberInPoints)."'");
echo '<script>location="'.$page.'.php"</script>';
?>
