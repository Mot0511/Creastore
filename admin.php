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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/jquery.js"></script>
    <style media="screen">
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
      color: <?php echo $data[0]['buttonTextBg']; ?>;
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
      .settings h1, h2, h3, p, label{
        color: <?php echo $data[0]['textColor']; ?>
      }
      .settings{
        margin-top: 50px;
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
                <label for="inputPass" class="col-sm-2 col-form-label">Описание</label>
                <div class="col-sm-10">
                  <textarea name="compound" class="form-control" required id="inputCompound" autocomplete="off" rows="5" cols="80"></textarea>
                  <!-- <input type="text" class="form-control" required id="inputCompound" name="compound" value="" autocomplete="off"> -->
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
            for ($data1 = []; $row = mysqli_fetch_assoc($res); $data1 [] = $row);

            echo '<p class="heading">'.$i.'</p>';
            foreach ($data1 as $j){
              echo '
                <div class="col-lg-4">
                <a href="product.php?name='.$j['name'].'&compound='.$j['compound'].'&image='.$j['image'].'"><div class="product">
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



        ?></div>
        <h2 class="heading">Настройки</h2>
        <div class="settings">
          <form class="" action="setSettings.php" method="post">
          <div class="">
            <h3 class="mt-4">Данные для подключения к базе данных:</h3>
            <div class="">
              <label for="host" class="form-label">Хост</label>
              <input type="text" id="host" class="form-control" name="host" value="<?php echo file_get_contents('data/hostDB.txt'); ?>" required>
            </div>
            <div class="">
              <label for="login" class="form-label">Логин</label>
                <input type="text" id="login" class="form-control" name="login" value="<?php echo file_get_contents('data/loginDB.txt'); ?>" required>
            </div>
            <div class="">
              <label for="password" class="form-label">Пароль</label>
              <input type="text" id="password" class="form-control" name="password" value="<?php echo file_get_contents('data/passwordDB.txt'); ?>" required>
            </div>
            <div class="">
              <label for="nameDB" class="form-label">Название базы данных</label>
              <input type="text" id="nameDB" class="form-control" name="nameDB" value="<?php echo file_get_contents('data/nameDB.txt'); ?>" required>
            </div>

          </div>
          <div class="">
            <h3 class="mt-4">Основаня информация</h3>
            <div class="">
              <label for="name" class="form-label">Название сайта</label>
              <input type="text" id="name" class="form-control" name="name" value="<?php echo $data[0]['name']; ?>" required>
            </div>
            <div class="">
              <label for="name" class="form-label">Иконка сайта</label>
              <input type="file" id="name" class="form-control" name="icon" value="" required>
            </div>
            <div class="">
              <label for="bg" class="form-label">Фон</label>
              <input type="color" id="bg" class="form-control" name="bg" value="#333333" required>
            </div>
            <div class="">
              <label for="blockBg" class="form-label">Фон блоков</label>
              <input type="color" id="blockBg" class="form-control" name="blockBg" value="<?php echo $data[0]['blockBg']; ?>" required>
            </div>
            <div class="">
              <label for="buttonBg" class="form-label">Фон кнопок</label>
              <input type="color" id="buttonBg" class="form-control" name="buttonBg" value="<?php echo $data[0]['buttonBg']; ?>" required>
            </div>
            <div class="">
              <label for="textColor" class="form-label">Цвет текста</label>
              <input type="color" id="textColor" class="form-control" name="textColor" value="<?php echo $data[0]['textColor']; ?>" required>
            </div>
            <div class="">
              <label for="buttonTextColor" class="form-label">Цвет текста на кнопках</label>
              <input type="color" id="buttonTextColor" class="form-control" name="buttonTextColor" value="<?php echo $data[0]['buttonTextColor']; ?>" required>
            </div>
          </div>
          <div class="">
            <h3 class="mt-4">Пользователи</h3>
            <div class="users">
              <div class="row" id="admins">
            <?php
              $users_res = mysqli_query($link, "SELECT * FROM `users`");
              for ($users = []; $row = mysqli_fetch_assoc($users_res); $users [] = $row);

              foreach ($users as $i){
                echo '
                <div class="col-lg-3 user" id="0">
                  <label for="name" class="form-label">Логин</label>
                  <input type="text" id="name" class="form-control" name="logins[]" value="'.$i['email'].'" required>
                  <label for="password" class="form-label">Пароль</label>
                  <input type="password" id="password" class="form-control" name="passwords[]" value="'.$i['password'].'" required>
                  <label for="types" class="form-label">Тип</label>
                  ';
                  if ($i['status'] == 1){
                    echo '
                    <select id="types" class="form-control" name="types[]" value="'.$i['status'].'" required="required">
                      <option value="">Выберите значение</option>
                      <option value="1" selected>Админ</option>
                      <option value="2">Пункт приема заказов</option>
                      <option value="3">Курьер</option>
                    </select>
                    <button type="button" onClick="removeAdmin("0")" class="btn btn-danger mt-4" name="button">Удалить пользователя</button>
                  </div>
                  ';

                  }
                  else if ($i['status'] == 2){
                    echo '
                    <select id="types" class="form-control" name="types[]" value="'.$i['status'].'" required="required">
                      <option value="">Выберите значение</option>
                      <option value="1">Админ</option>
                      <option value="2" selected>Пункт приема заказов</option>
                      <option value="3">Курьер</option>
                    </select>
                    <button type="button" onClick="removeAdmin("0")" class="btn btn-danger mt-4" name="button">Удалить пользователя</button>
                  </div>
                  ';

                  }
                  else if ($i['status'] == 3){
                    echo '
                    <select id="types" class="form-control" name="types[]" value="'.$i['status'].'" required="required">
                      <option value="">Выберите значение</option>
                      <option value="1">Админ</option>
                      <option value="2">Пункт приема заказов</option>
                      <option value="3" selected>Курьер</option>
                    </select>
                    <button type="button" onClick="removeAdmin("0")" class="btn btn-danger mt-4" name="button">Удалить пользователя</button>
                  </div>
                  ';

                  }
              }
              $link->close();
            ?>
</div>
              <button type="button" id="addAdmin" class="btn btn-success mt-4" name="button">Добавить пользователя</button>
            </div>

          </div>
        </div>
        <input type="submit" name="" class="form-control mt-4 btn btn-primary" value="Сохранить изменения">

      </form>
</div>
</div>
<script type="text/javascript">
var adminId = 0;
function removeAdmin(id) {

  $('#' + id).remove();
}
$('#addAdmin').click(function(){
    adminId++;
    $('#admins').append('\
    <div class="col-lg-3 user" id="' + adminId + '">\
    <label for="name" class="form-label">Логин</label>\
    <input type="text" id="name" class="form-control" name="logins[]" value="" required>\
    <label for="password" class="form-label">Пароль</label>\
    <input type="password" id="password" class="form-control" name="passwords[]" value="" required>\
    <label for="types" class="form-label">Тип</label>\
    <select id="types" class="form-control" name="types[]" required="required">\
      <option value="">Выберите значение</option>\
      <option value="1">Админ</option>\
      <option value="2">Пункт приема заказов</option>\
      <option value="3">Курьер</option>\
    </select>\
      <button type="button" onClick="removeAdmin(\'' + adminId + '\')" class="btn btn-danger mt-4" name="button">Удалить пользователя</button>\
    </div>\
    ');
});

var prodId = 0;
function removeProd(id) {
  $('#' + id).remove();
}
$('#addProd').click(function(){
    prodId++;
    id = 'prod' + prodId;
    $('#products').append('\
    <div class="col-lg-3 product" id="'+id+'">\
        <label for="productName" class="col-sm-2 col-form-label">Название</label>\
        <div class="col-sm-10">\
          <input type="text" class="form-control" required id="productName" name="productNames[]" value="" autocomplete="off">\
        </div>\
        <label for="compound" class="col-sm-2 col-form-label">Описание</label>\
          <textarea name="compounds[]" class="form-control" required id="compound" autocomplete="off" rows="5" cols="80"></textarea>\
          <!-- <input type="text" class="form-control" required id="inputCompound" name="compound" value="" autocomplete="off"> -->\
        <label for="inputPass" class="col-sm-2 col-form-label">Картинка</label>\
          <input type="file" class="form-control" required id="inputImage" name="images[]" value="" autocomplete="off">\
        <label for="inputPass" class="col-sm-2 col-form-label">Категория</label>\
          <input type="text" class="form-control" required id="inputCompound" name="groups[]" value="" autocomplete="off">\
        <label for="inputPass" class="col-sm-2 col-form-label">Цена (рубль)</label>\
          <input type="number" class="form-control" required id="inputCompound" name="prices[]" value="" autocomplete="off">\
      <button type="button" onClick="removeProd(\''+id+'\')" class="btn btn-danger mt-4" name="button">Удалить товар</button>\
    </div>\
    ');
});

</script>

</body>
</html>
