<?php
if (isset($_COOKIE['login']) and isset($_COOKIE['pass'])){
  $login = $_COOKIE['login'];
  $pass = $_COOKIE['pass'];

  $btAddToCart = 1;
  if ($login == 'admin' or $login == 'point'){
    $btAddToCart = 0;
  }
}
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ShawClub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="" id="linkCSS">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style media="screen" id='css'>
      .products{
        margin-top: 95px;
      }
      .product{
        background: #3F1A00;
        border-radius: 20px;
        width: 297px;
        padding-bottom: 20px;
        margin-top: 25px;
      }
      .heading{
        font-size: 36px;
        color: white;
        position: relative;
        top: 30px;
      }
      .orderNow{
        width: 134px;
        height: 55px;
        border: 5px solid #CE0000;
        border-radius: 20px;
        background: none;
        color: white;
        font-size: 18px;
        transition: background-color 0.3s;
      }
      .orderNow:hover{
        background-color: #CE0000;
      }
      .addToCart{
        width: 90%;
        height: 55px;
        background: #CE0000;
        border-radius: 20px;
        border: 0px;
        margin-left: px;
        margin-top: 10px;
        color: white;
        font-size: 20px;
        transition: background-color 0.2s;
      }
      .addToCart:hover{
        background-color: #870000;
      }
      .imageProduct{
        margin-top: 20px;
        width: 80%;
        border-radius: 20px;
      }
      .product p{
        font-size: 20px;
      }
      @media (max-width: 1000px){
        .heading{
          font-size: 60px;
        }
        .product{
          width: 100%;
        }
        .product p{
          font-size: 40px;
        }
        .addToCart{
          font-size: 35px;
          height: 80px;
        }

      }
    </style>
  </head>
  <body>

    <?php require 'header.php'; ?>
    <div class="products" id="products">
      <div class="container">
        <div class="row">
          <?php
          $DBdata = [file_get_contents('data/hostDB.txt'), file_get_contents('data/loginDB.txt'), file_get_contents('data/passwordDB.txt'), file_get_contents('data/nameDB.txt')];

          if (! function_exists("array_key_last")) {
              function array_key_last($array) {
                  if (!is_array($array) || empty($array)) {
                      return NULL;
                  }

                  return array_keys($array)[count($array)-1];
              }
          }
            $groups = [];
            $groups2 = [];
            $cartProducts = [];
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
            if ($link == false){
              print(mysqli_connect_error());
            }
            mysqli_set_charset($link, 'utf8');

            $group = mysqli_query($link, "SELECT * FROM products");
            for ($cater = []; $row = mysqli_fetch_assoc($group); $cater[] = $row);

            $cartProduct_res = mysqli_query($link, "SELECT * FROM cart WHERE email = '".$login."'");
            for ($cartProduct_data = []; $row = mysqli_fetch_assoc($cartProduct_res); $cartProduct_data[] = $row);
            foreach ($cartProduct_data as $i){
                array_push($cartProducts, $i['name']);
            }

            for ($l = 0; $l < count($cater); $l++){
              array_push($groups2, $cater[$l]['category']);
            }
            $groups2 = array_unique($groups2);

            foreach ($groups2 as $i){
              array_push($groups, $i);
            }


            $id = 0;
            foreach ($groups as $i){
              $res = mysqli_query($link, "SELECT * FROM products WHERE category = '".$i."'");
              for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

              echo '<p class="heading" id="'.$id.'">'.$i.'</p>';
              $id += 1;
              foreach ($data as $j){
                echo '
                  <div class="col-lg-4">
                  <a href="product.php?name='.$j['name'].'&compound='.$j['compound'].'&image='.$j['image'].'&email='.$login.'"><div class="product">
                      <center>
                        <div class="orderBts">
                        <img src="img/products/'.$j['image'].'" class="imageProduct" alt="">
                        <p>'.$j['name'].'</p>
                        <h3>'.$j['price'].' р.</h3>
                        </a>';
                        if ($_COOKIE['login'] == ''){
                          echo '<button type="submit" class="addToCart" name="button" data-bs-toggle="modal" data-bs-target="#exampleModal" name="addToCart">В корзину</button>';
                        }
                        else{
                          if ($btAddToCart == 1){
                            echo '<a href="addToCart.php?name='.$j['name'].'&email='.$login.'&price='.$j['price'].'"><button type="submit" class="addToCart" name="addToCart">В корзину</button></a>';
                            if (in_array($j['name'], $cartProducts)){
                              echo '<a href="product.php?name='.$j['name'].'&compound='.$j['compound'].'&image='.$j['image'].'&email='.$login.'"><p>Уже есть в корзине</p>';
                            }
                          }
                        }

                        echo '
                      </div>
                    </center>
                    </div></a>
                  </div>
                ';


              }

            }


            $link->close();
          ?>
        </div>

      </div>
    </div>
  </body>
</html>
