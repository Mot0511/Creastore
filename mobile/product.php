<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ShawClub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style media="screen">
.orderNow{
  width: 49%;
  height: 55px;
  border: 5px solid #CE0000;
  border-radius: 20px;
  background: none;
  color: white;
  font-size: 18px;
  transition: background-color 0.3s;
  margin-top: 100px;
}
.orderNow:hover{
  background-color: #CE0000;
}
.addToCart{
  width: 100%;
  height: 55px;
  background: #CE0000;
  border-radius: 20px;
  border: 0px;
  margin-left: 10px;
  margin-top: 50px;
  color: white;
  font-size: 20px;
  transition: background-color 0.2s;
}
.addToCart:hover{
  background-color: #870000;
}
.image{
  width: 296px;
  border-radius: 20px;
  margin-top: 70px;
}
.heading{
  margin-top: 70px;
  font-size: 35px;
  margin-left: -100px;
}
.compound{
  font-size: 24px;
  margin-left: -100px;
}
</style>
</head>
  <body>
    <?php require 'header.php'; ?>
    <?php
    $name = $_GET['name'];
    $compound = $_GET['compound'];
    $image = $_GET['image'];
    $email = $_GET['email'];
    ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <img src="img/products/<?php echo $image; ?>" class="image" alt="">
        </div>
        <div class="col-lg-4">
          <p class="heading">Шаурма "<?php echo $name; ?>"</p>
          <p class="compound"><?php echo $compound; ?></p>

        </div>
      </div>
      <div class="orderBts">
    <a href="addToCart.php?name=<?php echo $name; ?>&email=<?php echo $email; ?>"> <button type="button" class="addToCart" name="button">В корзину</button></a>
    </div>
    </div>
    <?php require 'footer.html'; ?>
  </body>
</html>
