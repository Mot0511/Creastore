<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style media="screen">
.orderNow{
  width: 49%;
  height: 55px;
  border: 5px solid <?php echo $data[0]['buttonBg']; ?>;
  border-radius: 20px;
  background: none;
  color: <?php echo $data[0]['buttonTextColor']; ?>;
  font-size: 18px;
  transition: background-color 0.3s;
  margin-top: 100px;
}
.orderNow:hover{
  background-color: <?php echo $data[0]['buttonBg']; ?>;
}
.addToCart{
  width: 100%;
  height: 55px;
  background: <?php echo $data[0]['buttonBg']; ?>;
  border-radius: 20px;
  border: 0px;
  margin-left: 10px;
  margin-top: 50px;
  color: <?php echo $data[0]['buttonTextColor']; ?>;
  font-size: 20px;
  transition: background-color 0.2s;
}
.addToCart:hover{
  background-color: <?php echo $data[0]['buttonBg']; ?>;
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
.price{
  margin-top: 70px;
  font-size: 35px;
  margin-left: 0px;
}
.compound{
  font-size: 24px;
  margin-left: -100px;
  width: 100px;
}

@media (max-width: 1000px){
  .image{
    width: 100%;
  }
  .text{
    margin-left: 100px;
  }
  .addToCart{
    margin-left: -5px;
    font-size: 30px;
  }
  .heading{
    font-size: 35px;
  }
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
    $price = $_GET['price'];
    ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <img src="img/products/<?php echo $image; ?>" class="image" alt="">
        </div>
        <div class="col-lg-4 text">
          <p class="heading">???????????? "<?php echo $name; ?>"</p>
          <p class="compound"><?php echo $compound; ?>
          </p>


        </div>
      </div>
      <p class="price">????????: <?php echo $price; ?> ??????.</p>
      <div class="orderBts">
    <a href="addToCart.php?name=<?php echo $name; ?>&email=<?php echo $email; ?>"> <button type="button" class="addToCart" name="button">?? ??????????????</button></a>
    </div>
    </div>
  </body>
</html>
