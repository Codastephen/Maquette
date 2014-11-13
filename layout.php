<!DOCTYPE html>
<html lang="en">
<head>
 <?php require_once('header.php'); ?>
 <title><?= $titre ?></title>
</head>
<body>
 <div class="container-fluid">
  <div class="row top">
    <div class="col-lg-4 col-lg-offset-4">
      <a href="index.php">
      	<img src="./img/designal.png" class="img-responsive"/>
      </a>
    </div>
  </div>
  <?php echo $contenu ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="./js/bootstrap.js"></script>
<script src="./js/visitor.js"></script>
</body>
</html>