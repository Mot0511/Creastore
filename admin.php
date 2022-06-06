<?php
if (isset($_COOKIE['login']) and isset($_COOKIE['pass'])){
  $login = $_COOKIE['login'];
}
else{
  echo '<script>location="index.php"</script>';
}
$page = basename(__FILE__);
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ShawClub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/jquery.js"></script>
    <style media="screen">
    .loginBt{
      width: 201px;
      background-color: #CE0000;
      transition: background-color 0.3s;
      border: 0px;
      border-radius: 20px;
      color: white;
      font-size: 24px;
    }
    .loginBt:hover{
      background-color: #870000;
    }
    .shawarma{
      margin-top: 95px;
    }
    .product{
      background: #3F1A00;
      border-radius: 20px;
      width: 297px;
      padding-bottom: 20px;
      margin-top: 25px;
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
      width: 134px;
      height: 55px;
      background: #CE0000;
      border-radius: 20px;
      border: 0px;
      margin-left: 10px;
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
      border: 5px solid #CE0000;
      border-radius: 20px;
      background: none;
      color: white;
      font-size: 18px;
      transition: background-color 0.3s;
      margin-top: 20px;
    }
    .remove:hover{
      background-color: #CE0000;
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
    @media (max-width: 1000px){
      .loginBt{
        width: 100%;
        font-size: 50px;
      }
      .product{
        width: 100%;
      }
      .product p{
        font-size: 40px;
      }
      .remove{
        width: 500px;
        font-size: 30px;
      }
      .heading{
          font-size: 60px;
      }
      }
    </style>
  </head>
  <body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Добавить товар</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" name="button"></button>
          </div>
          <div class="modal-body">
            <form class="" action="addProduct.php" method="post" enctype="multipart/form-data">
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Название</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" required id="inputName" name="name" value="" autocomplete="off">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPass" class="col-sm-2 col-form-label">Состав</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" required id="inputCompound" name="compound" value="" autocomplete="off">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPass" class="col-sm-2 col-form-label">Картинка</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" required id="inputImage" name="image" value="" autocomplete="off">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPass" class="col-sm-2 col-form-label">Категория</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" required id="inputCompound" name="group" value="" autocomplete="off">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPass" class="col-sm-2 col-form-label">Цена (рубль)</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" required id="inputCompound" name="price" value="" autocomplete="off">
                </div>
              </div>
              <input type="submit" class="btn btn-primary " name="button" value="Добавить товар">
            </form>

          </div>
        </div>
      </div>
    </div>

    <?php require 'header.php'; ?>
  <div class="shawarma" id="shawarma">
    <div class="container">
      <button type="button" class="loginBt" name="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Добавить товар</button>
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
          mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
          $link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
          if ($link == false){
            print(mysqli_connect_error());
          }
          mysqli_set_charset($link, 'utf8');

          $group = mysqli_query($link, "SELECT * FROM products");
          for ($cater = []; $row = mysqli_fetch_assoc($group); $cater[] = $row);

          for ($l = 0; $l < count($cater); $l++){
            array_push($groups2, $cater[$l]['category']);
          }
          $groups2 = array_unique($groups2);

          foreach ($groups2 as $i){
            array_push($groups, $i);
          }



          foreach ($groups as $i){
            $res = mysqli_query($link, "SELECT * FROM products WHERE category = '".$i."'");
            for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

            echo '<p class="heading">'.$i.'</p>';
            foreach ($data as $j){
              echo '
                <div class="col-lg-4">
                <a href="product.php?name='.$j['name'].'&compound='.$j[$i]['compound'].'&image='.$j['image'].'"><div class="product">
                    <center>
                      <div class="orderBts">
                      <img src="img/products/'.$j['image'].'" class="imageProduct" alt="">
                      <p>'.$j['name'].'</p>
                      <h3>'.$j['price'].' р.</h3>
                      <a href="removeProduct.php?id='.$j['id'].'"><button type="button" class="orderNow" class="remove" name="button">Удалить</button>
                    </div>
                  </center>
                  </div></a>
                </div>
              ';

            }

          }


          $link->close();
        ?></div>

</div>
</div>
</body>
</html>
