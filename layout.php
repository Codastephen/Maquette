<!DOCTYPE html>
<html lang="en">
<head>
 <?php require_once('header.php'); ?>
 <title><?= $titre ?></title>
</head>
<body>
 <div class="container-fluid">
  <div class="row" style="margin-bottom : 50px">
    <div class="col-lg-4 col-lg-offset-4">
      <img src="./img/designal.png" class="img-responsive"/>
    </div>
  </div>
  <?= $contenu ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="./js/visitor.js"></script>
</body>
</html>