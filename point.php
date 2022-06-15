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
    <title>ShawClub</title>
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
      background-color: #<?php echo $data[0]['buttonBg']; ?>;
      transition: background-color 0.3s;
      border: 0px;
      border-radius: 20px;
      color: #<?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 24px;
    }
    .loginBt:hover{
      background-color: #<?php echo $data[0]['buttonBg']; ?>;
    }
    .shawarma{
      margin-top: 95px;
    }
    .product{
      background: #<?php echo $data[0]['blockBg']; ?>;
      border-radius: 20px;
      width: 297px;
      padding-bottom: 20px;
      margin-top: 25px;
    }

    .orderNow{
      width: 134px;
      height: 55px;
      border: 5px solid #<?php echo $data[0]['buttonBg']; ?>;
      border-radius: 20px;
      background: none;
      color: #<?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 18px;
      transition: background-color 0.3s;
    }
    .orderNow:hover{
      background-color: #<?php echo $data[0]['buttonBg']; ?>;
    }
    .addToCart{
      width: 134px;
      height: 55px;
      background: #<?php echo $data[0]['buttonBg']; ?>;
      border-radius: 20px;
      border: 0px;
      margin-left: 10px;
      margin-top: 10px;
      color: #<?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 20px;
      transition: background-color 0.2s;
    }
    .addToCart:hover{
      background-color: #<?php echo $data[0]['buttonBg']; ?>;
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
      color: #<?php echo $data[0]['TextColor']; ?>;
      margin-top: 50px;
      position: relative;
      top: 30px;
    }
    .remove{
      width: 95%;
      height: 55px;
      border: 5px solid #<?php echo $data[0]['buttonBg']; ?>;
      border-radius: 20px;
      background: none;
      color: #<?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 18px;
      transition: background-color 0.3s;
      margin-top: 20px;
    }
    .remove:hover{
      background-color: #<?php echo $data[0]['buttonBg']; ?>;
    }
    .edit{
      width: 95%;
      height: 55px;
      background: #<?php echo $data[0]['buttonBg']; ?>;
      border-radius: 20px;
      border: 0px;
      margin-left: 10px;
      margin-top: 10px;
      color: #<?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 20px;
      transition: background-color 0.2s;
      margin-top: 20px;
      margin-left: 0px;
    }
    .edit:hover{
      background-color: #<?php echo $data[0]['buttonBg']; ?>;
    }
    .editBlock{
      width: 462px;
      height: 550px;
      background: #<?php echo $data[0]['buttonBg']; ?>;
      border-radius: 20px;
      position: fixed;
      left: 35%;
      display: none;
    }
    .editBlock p{
      font-size: 36px;
    }
    .editLabel{
      color: #<?php echo $data[0]['textColor']; ?>;
      font-size: 24px;
    }
    .input{
      width: 95%;
      background-color: #<?php echo $data[0]['blockBg']; ?>;
      height: 55px;
      border: 0px;
      border-radius: 10px;
      font-size: 24px;
      color: white;
    }
    .button{
      width: 95%;
      background-color: #<?php echo $data[0]['buttonBg']; ?>;
      height: 55px;
      border: 0px;
      border-radius: 10px;
      font-size: 24px;
      color: #<?php echo $data[0]['buttonTextColor']; ?>;
      margin-top: 20px;
      transition: background-color 0.2s;
    }
    .button:hover{
      background-color: #<?php echo $data[0]['buttonBg']; ?>;
    }
    h1{
      color: white;
    }
    .thing{
      border-radius: 20px;
      background-color: #<?php echo $data[0]['blockBg']; ?>;
      padding-top: 10px;
      padding-left: 10px;
      margin-bottom: 20px;
    }
    .thing h2{
      font-size: 36px;
      color: white;
    }
    .thing p{
      font-size: 24px;
    }
    .done{
      width: 134px;
      height: 55px;
      background-color: #<?php echo $data[0]['buttonBg']; ?>;
      border-radius: 20px;
      border: 0px;
      color: #<?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 20px;
      transition: background-color 0.3s;
      margin-top: 10px;

    }
    .done:hover{
      background-color: #<?php echo $data[0]['buttonBg']; ?>;
    }
    .cancel{
      width: 134px;
      height: 55px;
      border-radius: 20px;
      color: #<?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 20px;
      border: 5px solid #<?php echo $data[0]['buttonBg']; ?>;
      background: none;
      transition: background-color 0.3s;
      margin-top: 10px;
      margin-left: 50px;
      margin-bottom: 10px;
    }
    .cancel:hover{
      background-color: #<?php echo $data[0]['buttonBg']; ?>;
    }
    .statusBt{
      width: 268px;
      height: 55px;
      background-color: #<?php echo $data[0]['buttonBg']; ?>;
      transition: background-color 0.3s;
      border: 0px;
      border-radius: 20px;
      color: #<?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 20px;
    }
    .statusBt:hover{
      background-color: #<?php echo $data[0]['buttonBg']; ?>;
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
      .cancel{
        width: 100%;
        height: 60px;
        font-size: 30px;
      }
    }

    </style>
  </head>
  <body>
    <?php require 'header.php'; ?>
  <div class="shawarma" id="shawarma">
    <div class="container">
      <?php
        $isOrders = false;
        $noList = $_GET['noList'];
        $DBdata = [file_get_contents('data/hostDB.txt'), file_get_contents('data/loginDB.txt'), file_get_contents('data/passwordDB.txt'), file_get_contents('data/nameDB.txt')];

        $link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
        mysqli_set_charset($link, 'utf8');

        $res = mysqli_query($link, "SELECT * FROM point ORDER BY id DESC");
        for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

        if ($data != []){
          foreach ($data as $i){
            if ($i['point'] == $login){
              $isOrders = true;
              echo '
              <div class="row thing">
                <div class="col-lg-6">
                  <h2>'.$i['products'].'</h2>
                  <p>'.$i['number'].'</p>
                </div>
                <div class="col-lg-6">
                ';
                if ($i['status'] == 0){
                  echo '
                  <a href="changeStatus.php?products='.$i['products'].'&number='.$i['number'].'&email='.$i['email'].'&status=1&id='.$i['id'].'&page=point&address='.$i['address'].'&price='.$i['price'].'&point='.$login.'&carrier=carrier"><button type="button" name="button" class="done">Принять</button> </a>
                  <a href="selectOtherPoint.php?id='.$i['id'].'&products='.$i['products'].'&number='.$i['number'].'&email='.$i['email'].'&status=0&id='.$i['id'].'&page=point&address='.$i['address'].'&price='.$i['price'].'&noList[]='.$noList.'&newPointToList='.$login.'"><button type="button" name="button" class="cancel">Отменить</button> </a>
                  ';
                }
                else if($i['status'] == 1){
                  echo '
                  <a href="changeStatus.php?products='.$i['products'].'&number='.$i['number'].'&email='.$i['email'].'&status=2&id='.$i['id'].'&page=point&address='.$i['address'].'&price='.$i['price'].'&point='.$login.'"><button type="button" name="button" class="done">Готово</button></a>
                  <a href="changeStatus.php?products='.$i['products'].'&number='.$i['number'].'&email='.$i['email'].'&status=3&id='.$i['id'].'&page=point&address='.$i['address'].'&price='.$i['price'].'&point='.$login.'"><button type="button" name="button" class="cancel">Отменить</button></a>
                  ';
                }
                else if($i['status'] == 2 or $i['status'] == 4){
                  echo '<br><h2 style="color: green;">Заказ выполнен и отправлен курьеру</h2>';
                  echo '<a href="changeStatus.php?products='.$i['products'].'&number='.$i['number'].'&email='.$i['email'].'&status=1&id='.$i['id'].'&page=point&address='.$i['address'].'&price='.$i['price'].'&point='.$login.'"><button type="button" name="button" class="cancel">Отменить</button></a>';
                }
                else if($i['status'] == 3){
                  echo '<br><h2 style="color: red;">Заказ отменен исполнителем</h2>';
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
        if (!$isOrders){
          echo '<h1>Заказов пока нет</h1>';
        }

      ?>

  </div>
  </div>


</body>
</html>
