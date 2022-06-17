<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Добро пожаловать!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <style media="screen">
      .user{
        padding-bottom: 10px;
        padding-top: 10px;
        border: 1px #7d7d7d solid;
        border-radius: 10px;
        margin-left: 11px;
        margin-top: 11px;
      }
      .product{
        padding-bottom: 10px;
        padding-top: 10px;
        border: 1px #7d7d7d solid;
        border-radius: 10px;
        margin-left: 11px;
        margin-top: 11px;
        width: 500px;
      }
    </style>
  </head>
  <body>
    <div class="container my-3">
      <h1>Добро пожаловать! Впишите данные для сайта</h1>
      <form class="" action="start.php" method="post">
        <div class="">
          <h3 class="mt-4">Данные для подключения к базе данных:</h3>
          <div class="">
            <label for="host" class="form-label">Хост</label>
            <input type="text" id="host" class="form-control" name="host" value="localhost" required>
          </div>
          <div class="">
            <label for="login" class="form-label">Логин</label>
              <input type="text" id="login" class="form-control" name="login" value="testStore" required>
          </div>
          <div class="">
            <label for="password" class="form-label">Пароль</label>
            <input type="text" id="password" class="form-control" name="password" value="123" required>
          </div>
          <div class="">
            <label for="nameDB" class="form-label">Название базы данных</label>
            <input type="text" id="nameDB" class="form-control" name="nameDB" value="testStore" required>
          </div>

        </div>
        <div class="">
          <h3 class="mt-4">Основаня информация</h3>
          <div class="">
            <label for="name" class="form-label">Название сайта</label>
            <input type="text" id="name" class="form-control" name="name" value="" required>
          </div>
          <div class="">
            <label for="bg" class="form-label">Фон</label>
            <input type="color" id="bg" class="form-control" name="bg" value="" required>
          </div>
          <div class="">
            <label for="blockBg" class="form-label">Фон блоков</label>
            <input type="color" id="blockBg" class="form-control" name="blockBg" value="" required>
          </div>
          <div class="">
            <label for="buttonBg" class="form-label">Фон кнопок</label>
            <input type="color" id="buttonBg" class="form-control" name="buttonBg" value="" required>
          </div>
          <div class="">
            <label for="textColor" class="form-label">Цвет текста</label>
            <input type="color" id="textColor" class="form-control" name="textColor" value="" required>
          </div>
          <div class="">
            <label for="buttonTextColor" class="form-label">Цвет текста на кнопках</label>
            <input type="color" id="buttonTextColor" class="form-control" name="buttonTextColor" value="" required>
          </div>
        </div>
        <div class="">
          <h3 class="mt-4">Пользователи</h3>
          <div class="users">
            <div class="row" id="admins">
              <div class="col-lg-3 user" id='0'>
                <label for="name" class="form-label">Логин</label>
                <input type="text" id="name" class="form-control" name="logins[]" value="" required>
                <label for="password" class="form-label">Пароль</label>
                <input type="password" id="password" class="form-control" name="passwords[]" value="" required>
                <label for="types" class="form-label">Тип</label>

                <select id="types" class="form-control" name="types[]" required="required">
                  <option value="">Выберите значение</option>
                  <option value="1">Админ</option>
                  <option value="2">Пункт приема заказов</option>
                  <option value="3">Курьер</option>
                </select>

                <button type="button" onClick="removeAdmin('0')" class="btn btn-danger mt-4" name="button">Удалить пользователя</button>
              </div>
            </div>
            <button type="button" id="addAdmin" class="btn btn-success mt-4" name="button">Добавить пользователя</button>
          </div>
        </div>

        <div class="">
          <h3 class="mt-4">Товары</h3>
          <div class="users">
            <div class="row" id="products">
              <div class="col-lg-3 product" id='prod0'>
                  <label for="productName" class="col-sm-2 col-form-label">Название</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required id="productName" name="productNames[]" value="" autocomplete="off">
                  </div>
                  <label for="compound" class="col-sm-2 col-form-label">Описание</label>
                    <textarea name="compounds[]" class="form-control" required id="compound" autocomplete="off" rows="5" cols="80"></textarea>
                    <!-- <input type="text" class="form-control" required id="inputCompound" name="compound" value="" autocomplete="off"> -->
                  <label for="inputPass" class="col-sm-2 col-form-label">Картинка</label>
                    <input type="file" class="form-control" required id="inputImage" name="images[]" value="" autocomplete="off">
                  <label for="inputPass" class="col-sm-2 col-form-label">Категория</label>
                    <input type="text" class="form-control" required id="inputCompound" name="groups[]" value="" autocomplete="off">
                  <label for="inputPass" class="col-sm-2 col-form-label">Цена (рубль)</label>
                    <input type="number" class="form-control" required id="inputCompound" name="prices[]" value="" autocomplete="off">
                <button type="button" onClick="removeProd('prod0')" class="btn btn-danger mt-4" name="button">Удалить товар</button>
              </div>
            </div>
            <button type="button" id="addProd" class="btn btn-success mt-4" name="button">Добавить товар</button>
          </div>
        </div>
        <input type="submit" name="" class="form-control mt-4 btn btn-primary" value="Создать сайт">
        </form>
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
        <div class="col-lg-3 product" id="' + id + '">\
            <label for="inputEmail" class="col-sm-2 col-form-label">Название</label>\
            <div class="col-sm-10">\
              <input type="text" class="form-control" required id="inputName" name="name" value="" autocomplete="off">\
            </div>\
            <label for="inputPass" class="col-sm-2 col-form-label">Описание</label>\
              <textarea name="compound" class="form-control" required id="inputCompound" autocomplete="off" rows="5" cols="80"></textarea>\
            <label for="inputPass" class="col-sm-2 col-form-label">Картинка</label>\
              <input type="file" class="form-control" required id="inputImage" name="image" value="" autocomplete="off">\
            <label for="inputPass" class="col-sm-2 col-form-label">Категория</label>\
              <input type="text" class="form-control" required id="inputCompound" name="group" value="" autocomplete="off">\
            <label for="inputPass" class="col-sm-2 col-form-label">Цена (рубль)</label>\
              <input type="number" class="form-control" required id="inputCompound" name="price" value="" autocomplete="off">\
          <button type="button" onClick="removeAdmin(\'' + id + '\')" class="btn btn-danger mt-4" name="button">Удалить товар</button>\
        </div>\
        ');
    });

    </script>
  </body>
</html>
