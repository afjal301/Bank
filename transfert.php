<?php
require_once "function/transfert.php";
if(isset($_GET["numexp"]) && isset($_GET["numrec"]) && isset($_GET["somme"])){
    $transfert=new Transfert($_GET["numexp"],$_GET["numrec"],$_GET["somme"]);
    $res=$transfert->pdo();
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <script src="boostrap/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <script src="boostrap/js/jquery.min.js"></script>
</head>
<body>
    <div class="transfert">
        <img src="img/versement.png" alt="" width="300" height="300">
        <h1>TRANSFERT</h1>
        <form action="" class="form-group">
            <input type="text" name="numexp" placeholder="Numero client Destinataire" class="form-control" min="1">
            <input type="text" name="numrec" placeholder="Numero client Recepteur" class="form-control" min="1">
            <input type="number" name="somme" placeholder="Somme à Envoyer" class="form-control">
            <button type="submit" class="btn btn-danger" style="color: yellow;">Transferer</button>
        </form>
        <a href="menu.php"><button class="btn btn-danger">TO MENU</button></a> 
    </div>
</body>
</html>