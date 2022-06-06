<?php
$DBdata = [file_get_contents('data/hostDB.txt'), file_get_contents('data/loginDB.txt'), file_get_contents('data/passwordDB.txt'), file_get_contents('data/nameDB.txt')];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$email = $_POST['email'];
$pass = $_POST['pass'];

// if ($email == 'admin' && $pass == '1324'){
//   setcookie('login', $email, time() + (86400 * 30), '/');
//   setcookie('pass', $pass, time() + (86400 * 30), '/');
//   echo '<script>location="admin.php"</script>';
//   exit;
// }
// else if ($email == 'point' && $pass == '1324'){
//   setcookie('login', $email, time() + (86400 * 30), '/');
//   setcookie('pass', $pass, time() + (86400 * 30), '/');
//   echo '<script>location="point.php"</script>';
//   exit;
// }
// else if ($email == 'carrier' && $pass == '1324'){
//   setcookie('login', $email, time() + (86400 * 30), '/');
//   setcookie('pass', $pass, time() + (86400 * 30), '/');
//   echo '<script>location="carrier.php"</script>';
//   exit;
// }
// else if ($email == 'carrier' or $email == 'point' or $email == 'admin'){
//   echo '<script>location="error.php?error=Неверный пароль&path=index.php"</script>';
// }

$link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
mysqli_set_charset($link, 'utf8');

$existsEmail = false;

$emails_res = mysqli_query($link, 'SELECT email FROM users');
for ($emails = []; $row = mysqli_fetch_assoc($emails_res); $emails[] = $row);

foreach ($emails as $i){
  if ($i['email'] == $email){
    $existsEmail = true;
    break;
  }
}

if (!$existsEmail){
  mysqli_query($link, "INSERT INTO users SET email='".$email."', password='".$pass."', status = 0");
  setcookie('login', $email, time() + (86400 * 30), '/');
  setcookie('pass', $pass, time() + (86400 * 30), '/');
  echo '<script>location="profile.php?email='.$email.'"</script>';
}
else{
  $password_res = mysqli_query($link, "SELECT password, status FROM users WHERE email = '".$email."'   ");
  for ($password = []; $row = mysqli_fetch_assoc($password_res); $password[] = $row);

  if ($password[0]['password'] == $pass){
    setcookie('login', $email, time() + (86400 * 30), '/');
    setcookie('pass', $pass, time() + (86400 * 30), '/');

    if ($password[0]['status'] == 0){
      echo '<script>location="profile.php?email='.$email.'"</script>';
    }
    else if ($password[0]['status'] == 1){
      echo '<script>location="admin.php?email='.$email.'"</script>';
    }
    else if ($password[0]['status'] == 2){
      echo '<script>location="point.php?email='.$email.'"</script>';
    }
    else if ($password[0]['status'] == 3){
      echo '<script>location="carrier.php?email='.$email.'"</script>';
    }

  }
  else{
    echo '<script>location="error.php?error=Неверный пароль&path=index.php"</script>';
  }
}


$link->close();
?>
