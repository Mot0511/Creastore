<?php
if (isset($_COOKIE['login']) and isset($_COOKIE['pass'])){
  $login = $_COOKIE['login'];
}
else{
  $login = $_SERVER['REMOTE_ADDR'];
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
      color: <?php echo $data[0]['TextColor']; ?>;
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
      background: <?php echo $data[0]['buttonBg']; ?>;
      border-radius: 20px;
      border: 0px;
      margin-left: 10px;
      margin-top: 10px;
      color: <?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 20px;
      transition: background-color 0.2s;
      margin-top: 20px;
      margin-left: 0px;
    }
    .edit:hover{
      background-color: <?php echo $data[0]['buttonBg']; ?>;
    }
    .editBlock{
      width: 462px;
      height: 550px;
      background: <?php echo $data[0]['buttonBg']; ?>;
      border-radius: 20px;
      position: fixed;
      left: 35%;
      display: none;
    }
    .editBlock p{
      font-size: 36px;
    }
    .editLabel{
      color: <?php echo $data[0]['textColor']; ?>;
      font-size: 24px;
    }
    .input{
      width: 95%;
      background-color: <?php echo $data[0]['blockBg']; ?>;
      height: 55px;
      border: 0px;
      border-radius: 10px;
      font-size: 24px;
      color: white;
    }
    .button{
      width: 95%;
      background-color: <?php echo $data[0]['buttonBg']; ?>;
      height: 55px;
      border: 0px;
      border-radius: 10px;
      font-size: 24px;
      color: <?php echo $data[0]['buttonTextColor']; ?>;
      margin-top: 20px;
      transition: background-color 0.2s;
    }
    .button:hover{
      background-color: <?php echo $data[0]['buttonBg']; ?>;
    }
    h1{
      color: white;
    }
    .thing{
      border-radius: 20px;
      background-color: <?php echo $data[0]['blockBg']; ?>;
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
      background-color: <?php echo $data[0]['buttonBg']; ?>;
      border-radius: 20px;
      border: 0px;
      color: <?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 20px;
      transition: background-color 0.3s;
      margin-top: 10px;

    }
    .done:hover{
      background-color: <?php echo $data[0]['buttonBg']; ?>;
    }
    .cancel{
      width: 134px;
      height: 55px;
      border-radius: 20px;
      color: <?php echo $data[0]['buttonTextColor']; ?>;
      font-size: 20px;
      border: 5px solid <?php echo $data[0]['buttonBg']; ?>;
      background: none;
      transition: background-color 0.3s;
      margin-top: 10px;
      margin-left: 50px;
      margin-bottom: 10px;
    }
    .cancel:hover{
      background-color: <?php echo $data[0]['buttonBg']; ?>;
    }
    .numberBt{
      width: 35px;
      height: 35px;
      background-color: <?php echo $data[0]['buttonBg']; ?>;
      transition: background-color 0.3s;
      color: <?php echo $data[0]['buttonTextColor']; ?>;
      border: 0;
      border-radius: 10px;
      font-size: 20px;
    }
    .numberBt:hover{
      background-color: <?php echo $data[0]['buttonBg']; ?>;
    }
    .numberControl{
      width: 250px;
    }
    .orderSendBt{
      width: 100%;
      height: 50px;
      font-size: 25px;
      color: <?php echo $data[0]['buttonTextColor']; ?>;
      border: 0;
      border-radius: 20px;
      background-color: <?php echo $data[0]['buttonBg']; ?>;
      transition: background-color 0.3s;
      margin-top: 50px;
    }
    .orderSendBt:hover{
      background-color: <?php echo $data[0]['buttonBg']; ?>;
    }
    .address{
      width: 100%;
      height: 40px;
      background-color: <?php echo $data[0]['blockBg']; ?>;
      color: white;
      border: 0;
      border-radius: 10px;
      margin-left: -10px;
    }
    .address::placeholder{
      color: <?php echo $data[0]['textColor']; ?>;
      font-size: 20px;
    }
    @media (max-width: 1000px){
      .thing{
        width: 130%;
        position: relative;
        left: -100px;
      }
      .thing h2{
        font-size: 70px;
      }
      .thing p{
        font-size: 50px;
      }
      .numberBt{
        width: 100px;
        height: 100px;
        font-size: 70px;
      }
      .cancel{
        width: 100%;
        height: 90px;
        margin-left: -10px;
        font-size: 50px;
      }
      .address{
        width: 130%;
        height: 90px;
        position: relative;
        left: -100px;
        font-size: 40px;
      }
      .address::placeholder{
        font-size: 28px;
      }
      .orderSendBt{
        width: 130%;
        height: 90px;
        position: relative;
        left: -100px;
        font-size: 50px;
      }
    }
    </style>
  </head>
  <body>
    <?php require 'header.php'; ?>
  <div class="shawarma" id="shawarma">
    <div class="container">
      <?php
        $DBdata = [file_get_contents('data/hostDB.txt'), file_get_contents('data/loginDB.txt'), file_get_contents('data/passwordDB.txt'), file_get_contents('data/nameDB.txt')];

        $email = $_GET['email'];
        $totalPrice = 0;
        $link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
        mysqli_set_charset($link, 'utf8');

        $res = mysqli_query($link, "SELECT * FROM cart WHERE email = '".$email."'");
        for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

        if ($data != []){
          foreach ($data as $i){
            echo '
            <div class="row thing">
              <div class="col-lg-10 ">
                <h2>'.$i['name'].'</h2>
                <h2>'.$i['price'].' р./шт.</h2>
                <div class="row numberControl">
                  <div class="col-lg-4">
                  <a href="addToCart.php?name='.$i['name'].'&email='.$login.'&price='.$i['price'].'"><button type="button" class="numberBt" name="button">+</button></a>

                  </div>
                  <div class="col-lg-4">
                    <p>'.$i['number'].' шт.</p>
                  </div>
                  <div class="col-lg-4">
                  <a href="minusNumber.php?name='.$i['name'].'&email='.$login.'&price='.$i['price'].'"><button type="button" class="numberBt" name="button">-</button></a>
                  </div>
                </div>

              </div>
              <div class="col-lg">
                  <form method="post" action="">
                  <a href="removeProductFromCart.php?id='.$i['id'].'&email='.$login.'"><button type="button" name="delete" class="cancel">Удалить</button></a>
                  </form>
              </div>
            </div>

            ';
            $totalPrice += $i['price'] * $i['number'];
          }
          echo '
          <br>
          <h1>Итого: '.$totalPrice.' руб.</h1>
          <br>
          <form class="" action="orderSend.php" method="post">
            <input type="hidden" name="email" value="'.$email.'">
            <input type="hidden" name="price" value="'.$totalPrice.'">
            <input type="text" class="address" name="address" placeholder="Введите адрес доставки (город, улица, дом, квартира, код домофона)"><br>
            <input type="submit" name="" class="orderSendBt" value="Отправить заказ с этими товарами">
          </form>

          ';
        }
        else{
          echo '
            <h1>У Вас в корзине нет товаров</h1>
          ';
        }

      ?>




      </div>
      </div>


</body>
</html>
