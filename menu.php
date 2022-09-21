<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Principale</title>
  <link rel="stylesheet" href="menu.css">
  <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
  <script src="boostrap/js/bootstrap.min.js"></script>
  <script src="main.js"></script>
  <script src="boostrap/js/jquery.min.js"></script>
</head>
<body>
  <div class="menu">
    <h1>MENU PRINCIPALE</h1>
    <ul>
      <li>
        <a href="client.php">
          <div class="one">
            <h2><span><img src="img/client.png" onclick="client()"></span> CLIENT</h2>
          </div>
        </a>
      </li>
      <li>
        <a href="versement.php">
          <div class="two">
            <h2><span><img src="img/froward.png"></span> VERSEMENT</h2>
        </div>
        </a>
      </li>
      <li>
        <a href="retrait.php">
          <div class="three">
            <h2><span><img src="img/retrait.png"></span> RETRAIT</h2>
        </div>
        </a>
      </li>
    </ul>
  </div>
</body>
</html>