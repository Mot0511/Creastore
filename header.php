<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="" id="headerLinkCSS">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style media="screen">
      .label{
        font-size: 48px;
        text-decoration: none;
      }
      p, a{
        color: white;
        text-decoration: none;
        transition: color 0.5s;
      }
      a:hover{
        color: grey;
      }
      body{
        background-color: #3C3C3C;
      }
      .container{
        margin-top: 30px;
      }
      .menu a{
        font-size: 24px;
        margin-left: 27px;
      }
      .menu{
        margin-top: 20px;
        width: 380px;
      }
      .loginBt{
        width: 201px;
        height: 77px;
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
      .profileBt{
        width: 201px;
        height: 83px;
        border: 5px solid #CE0000;
        border-radius: 20px;
        background: none;
        color: white;
        font-size: 24px;
        transition: background-color 0.3s;
        margin-left: 20px;
      }
      .profileBt:hover{
        background-color: #CE0000;
      }
      .cart{
        width: 50px;
        margin-top: 20px;
      }
      @media (max-width: 1000px){
        .menu a{
          font-size: 35px;
          margin-left: 27px;
        }
        .cart{
          width: 80px;
        }
        .loginBt, .profileBt{
          width: 90%;
          height: 100px;
          font-size: 30px;
          margin-top: 20px;
        }
      }
    </style>
  </head>
  <body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Войти/Зарегистрироваться</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" name="button"></button>
          </div>
          <div class="modal-body">
            <form class="" action="login.php" method="post">
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Почта</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email" required id="inputEmail" name="" value="">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPass" class="col-sm-2 col-form-label">Пароль</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="pass" required id="inputPass" name="" value="">
                </div>
              </div>
              <input type="submit" class="btn btn-primary" name="button" value="Войти/Зарегистрироваться">
            </form>

          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4 labelDiv">
        <a href="index.php" class="label">ShawClub</a>
        </div>
        <div class="col-md-4 menu">
          <?php
          $DBdata = [file_get_contents('data/hostDB.txt'), file_get_contents('data/loginDB.txt'), file_get_contents('data/passwordDB.txt'), file_get_contents('data/nameDB.txt')];

          mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
          $link = mysqli_connect($DBdata[0], $DBdata[1], $DBdata[2], $DBdata[3]);
          mysqli_set_charset($link, 'utf8');
          $groups = [];
          $groups2 = [];
          $group = mysqli_query($link, "SELECT * FROM products");
          for ($cater = []; $row = mysqli_fetch_assoc($group); $cater[] = $row);

          for ($l = 0; $l < count($cater); $l++){
            array_push($groups2, $cater[$l]['category']);
          }
          $groups2 = array_unique($groups2);
          foreach ($groups2 as $i){
            array_push($groups, $i);
          }

          $id = 0;
          $idBr = 3;
          foreach ($groups as $i){
            echo '<a href="index.php#'.$id.'">'.$i.'</a>';
            $id += 1;
            if ($id == $idBr){
              echo '<br>';
              $idBr += 3;
            }
          }
          ?>
        </div>
        <div class="col-md-4">
          <?php
          if ($page == 'profile.php'){
            echo '<a href="cart.php?email='.$_COOKIE['login'].'"><img src="img/cart.png" class="cart" alt=""> </a>';
            echo '<a href="exitProfile.php"><button type="button" class="profileBt" name="button">Выйти из</br>аккаунта</button></a>';
          }
          else if($page == 'point.php'){
            echo '<a href="exitProfile.php"><button type="button" class="profileBt" name="button">Выйти из</br>аккаунта</button></a>';
          }
          else if($page == 'admin.php'){
            echo '<a href="exitProfile.php"><button type="button" class="profileBt" name="button">Выйти из</br>аккаунта</button></a>';
          }
          else if($page == 'carrier.php'){
            echo '<a href="exitProfile.php"><button type="button" class="profileBt" name="button">Выйти из</br>аккаунта</button></a>';
          }

          else if (!isset($_COOKIE['login']) or !isset($_COOKIE['pass'])){
            echo '<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="loginBt" name="button">Войти<br>Регистрация</button></a>';
          }
          else if ($_COOKIE['login'] == 'point'){
            echo '<a href="point.php"><button type="button" class="profileBt" name="button">Перейти в<br>профиль</button></a>';
          }
          else if($_COOKIE['login'] == 'admin'){
            echo '<a href="admin.php"><button type="button" class="profileBt" name="button">Перейти в<br>профиль</button></a>';
          }
          else if($_COOKIE['login'] == 'carrier'){
            echo '<a href="carrier.php"><button type="button" class="profileBt" name="button">Перейти в<br>профиль</button></a>';
          }
          else{
            echo '<a href="cart.php?email='.$_COOKIE['login'].'"><img src="img/cart.png" class="cart" alt=""> </a>';
            echo '<a href="profile.php"><button type="button" class="profileBt" name="button">Перейти в<br>профиль</button></a>';
          }


          ?>

        </div>
      </div>
    </div>
  </body>
</html>
