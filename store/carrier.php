<?php
if (isset($_COOKIE['login']) and isset($_COOKIE['pass'])){
  $login = $_COOKIE['login'];
}
else{
  echo '<script>location="index.php"</script>';
}
$page = basename(__FILE__);

$DBdata = [file_get_contents('data/hostDB.txt'), file_get_contents('data/loginDB.txt'), file_get_contents('data/passwordDB.txt'), file_get_contents('data/nameDB.txt')];
$link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
$res = mysqli_query($link, "SELECT * FROM data");
for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $data[0]['name']; ?></title>
    <link rel="icon" href="img/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style media="screen">
    body{
      overflow: hidden;
    }
    .loginBt{
      width: 201px;
      background-color: <?php echo $data[0]['buttonBg']; ?>;
      transition: background-color 0.3s;
      border: 0px;
      border-radius: 20px;
      color: <?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 24px;
    }
    .loginBt:hover{
      background-color: <?php echo $data[0]['buttonBg']; ?>;
    }
    .shawarma{
      margin-top: 95px;
    }
    .product{
      background: <?php echo $data[0]['blockBg']; ?>;
      border-radius: 20px;
      width: 297px;
      padding-bottom: 20px;
      margin-top: 25px;
    }

    .orderNow{
      width: 134px;
      height: 55px;
      border: 5px solid <?php echo $data[0]['buttonBg']; ?>;
      border-radius: 20px;
      background: none;
      color: <?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 18px;
      transition: background-color 0.3s;
    }
    .orderNow:hover{
      background-color: <?php echo $data[0]['buttonBg']; ?>;
    }
    .addToCart{
      width: 134px;
      height: 55px;
      background: <?php echo $data[0]['buttonBg']; ?>;
      border-radius: 20px;
      border: 0px;
      margin-left: 10px;
      margin-top: 10px;
      color: <?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 20px;
      transition: background-color 0.2s;
    }
    .addToCart:hover{
      background-color: <?php echo $data[0]['buttonBg']; ?>;
    }
    .imageProduct{
      margin-top: 20px;
      width: 80%;
      border-radius: 20px;
    }
    .product p{
      font-size: 20px;
    }
    .heading{
      font-size: 36px;
      color: white;
      margin-top: 50px;
      position: relative;
      top: 30px;
    }
    .remove{
      width: 95%;
      height: 55px;
      border: 5px solid <?php echo $data[0]['buttonBg']; ?>;
      border-radius: 20px;
      background: none;
      color: <?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 18px;
      transition: background-color 0.3s;
      margin-top: 20px;
    }
    .remove:hover{
      background-color: <?php echo $data[0]['buttonBg']; ?>;
    }
    .edit{
      width: 95%;
      height: 55px;
      background: #CE0000;
      border-radius: 20px;
      border: 0px;
      margin-left: 10px;
      margin-top: 10px;
      color: white;
      font-size: 20px;
      transition: background-color 0.2s;
      margin-top: 20px;
      margin-left: 0px;
    }
    .edit:hover{
      background-color: #870000;
    }
    .editBlock{
      width: 462px;
      height: 550px;
      background: #CE0000;
      border-radius: 20px;
      position: fixed;
      left: 35%;
      display: none;
    }
    .editBlock p{
      font-size: 36px;
    }
    .editLabel{
      color: white;
      font-size: 24px;
    }
    .input{
      width: 95%;
      background-color: #3F1A00;
      height: 55px;
      border: 0px;
      border-radius: 10px;
      font-size: 24px;
      color: white;
    }
    .button{
      width: 95%;
      background-color: #562400;
      height: 55px;
      border: 0px;
      border-radius: 10px;
      font-size: 24px;
      color: white;
      margin-top: 20px;
      transition: background-color 0.2s;
    }
    .button:hover{
      background-color: #3F1A00;
    }
    h1{
      color: white;
    }
    .thing{
      border-radius: 20px;
      background-color: <?php echo $data[0]['blockBg']; ?>;
      padding-top: 5px;
      margin-bottom: 20px;
      padding-bottom: 5px;
    }
    .thing h2{
      font-size: 36px;
      color: <?php echo $data[0]['textColor']; ?>;
    }
    .thing p{
      font-size: 24px;
      color: <?php echo $data[0]['textColor']; ?>;
    }
    .done{
      width: 134px;
      height: 55px;
      background-color: <?php echo $data[0]['blockBg']; ?>;
      border-radius: 20px;
      border: 0px;
      color: <?php echo $data[0]['textColor']; ?>;
      font-size: 20px;
      transition: background-color 0.3s;
      margin-top: 10px;

    }
    .done:hover{
      background-color: <?php echo $data[0]['blockBg']; ?>;
    }
    .cancel{
      width: 134px;
      height: 55px;
      border-radius: 20px;
      color: <?php echo $data[0]['textColor']; ?>;
      font-size: 20px;
      border: 5px solid <?php echo $data[0]['blockBg']; ?>;
      background: none;
      transition: background-color 0.3s;
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .cancel:hover{
      background-color: <?php echo $data[0]['blockBg']; ?>;
    }
    .statusBt{
      width: 268px;
      height: 55px;
      background-color: <?php echo $data[0]['blockBg']; ?>;
      transition: background-color 0.3s;
      border: 0px;
      border-radius: 20px;
      color: <?php echo $data[0]['textColor']; ?>;
      font-size: 20px;
    }
    .statusBt:hover{
      background-color: <?php echo $data[0]['blockBg']; ?>;
    }
    @media (max-width: 1000px){
      .thing h2{
        font-size: 50px;
        color: white;
      }
      .thing p{
        font-size: 40px;
      }
      .done, .statusBt{
        width: 100%;
        height: 60px;
        font-size: 35px;
      }

    }
    </style>
  </head>
  <body>
    <?php require 'header.php'; ?>
  <div class="shawarma" id="shawarma">
    <div class="container things">
      <?php
      $DBdata = [file_get_contents('data/hostDB.txt'), file_get_contents('data/loginDB.txt'), file_get_contents('data/passwordDB.txt'), file_get_contents('data/nameDB.txt')];
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      $noList = $_GET['noList'];
      $link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
        mysqli_set_charset($link, 'utf8');

        $res2 = mysqli_query($link, "SELECT * FROM point ORDER BY id DESC");
        for ($data2 = []; $row = mysqli_fetch_assoc($res2); $data2[] = $row);

        if ($data2 != []){
          foreach ($data2 as $i){
            if ($i['carrier'] == $login){
              $isOrders = true;
            if ($i['status'] == 2 or $i['status'] == 4 or $i['status'] == 5){
              echo '
              <div class="row thing">
                <div class="col-lg-6">
                  <h2>'.$i['products'].'</h2>
                  <p>'.$i['number'].', '.$i['address'].'</p>
                  <h3 style="color: #'.$data[0]['textColor'].';">Стоимость: '.$i['price'].' руб.</h3>
                </div>
                <div class="col-lg-6">
                ';
                if ($i['status'] == 2){
                  echo '
                  <a href="changeStatus.php?products='.$i['products'].'&number='.$i['number'].'&email='.$i['email'].'&status=4&id='.$i['id'].'&page=carrier&address='.$i['address'].'&price='.$i['price'].'&carrier='.$login.'&point='.$i['point'].'"><button type="button" name="button" class="statusBt">Принять</button> </a>
                  <a href="selectOtherCarrier.php?id='.$i['id'].'&products='.$i['products'].'&number='.$i['number'].'&email='.$i['email'].'&status=0&id='.$i['id'].'&page=carrier&address='.$i['address'].'&price='.$i['price'].'&noList[]='.$noList.'&newPointToList='.$login.'&point='.$i['point'].'"><button type="button" name="button" class="cancel">Отменить</button> </a>
                  ';
                }
                else if($i['status'] == 4){
                  echo '
                  <a href="changeStatus.php?products='.$i['products'].'&number='.$i['number'].'&email='.$i['email'].'&status=5&id='.$i['id'].'&page=carrier&address='.$i['address'].'&price='.$i['price'].'&carrier='.$login.'&point='.$i['point'].'"><button type="button" name="button" class="done">Готово</button></a>
                  ';
                }
                else if($i['status'] == 5){
                  echo '<br><h2 style="color: green;">Заказ доставвлен</h2>';
                }
                echo '
                </div>
              </div>
                ';
            }
}
            }
        }
        if (!$isOrders){
          echo '<h1>Заказов пока нет</h1>';
        }
      ?>

  </div>
  </div>


</body>
</html>