<?php
$error = $_GET['error'];
$path = $_GET['path'];
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $error; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style media="screen">
      h1{
        font-size: 80px;
      }
      .main{
        margin-top: 15%;
      }
      a{
        font-size: 25px;
      }
      @media (max-width: 1000px){
        a{
          font-size: 40px;
        }
      }
    </style>
  </head>
  <body>
    <center>
    <div class="main">
      <h1><?php echo $error; ?></h1>
      <a href="<?php echo $path ?>">< Вернуться назад</a>
    </div>
  </center>
  </body>
</html>
