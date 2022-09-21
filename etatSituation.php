<?php
require_once "function/client.php";
$resultat=null;
if(isset($_GET["search"]) && $_GET["search"]!==""){
    $resultat=recherche($_GET["search"]);
}else{
    $resultat=select3();
}
$host='localhost';
$dbname='bank';
$username='root';
$password='';
$pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$query=$pdo->query("SELECT SUM(montant_versement) FROM verser");
$query2=$pdo->query("SELECT SUM(montant_retrait) FROM retrai");
$vers=$query->fetch();
$retrait=$query2->fetch();


$fin=intval($vers[0])-intval($retrait[0]);




//var_dump($_GET["name"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etat e situation des Client</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <script src="boostrap/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <script src="boostrap/js/jquery.min.js"></script>
</head>
<body>
    <div class="situation">
        <h1>Situation des CLIENT</h1>
        <a href="menu.php"> <button class="btn btn-danger" style="margin-left: -8cm;margin-right: 4cm;width: 4cm;">TO MENU</button></a>
        <a href="rechercheClient.php"> <button class="btn btn-primary" style="margin-left: -8cm;margin-right: 4cm;margin-top: 3cm;width: 4cm;">Retour</button></a>
        <form action="" class="form-group">
            <input type="text" name="search" id="" class="form-control" placeholder="Recherche Client">
            <button type="submit" class="btn btn-primary" style="margin-top:0.5cm">Recherche</button>
            <table class="table">
                <tr>
                    <td style="background-color: rgb(0, 183, 255);">Numero Compte</td>
                    <td style="background-color: rgb(0, 183, 255);">Nom Client</td>
                    <td style="background-color: rgb(0, 183, 255);">Solde</td>
                </tr>
                <?php foreach($resultat as $key):?>
            <tr>
                 <?php foreach($key as $k):?>
                <td><?=$k?></td>
                <?php endforeach?>
            </tr>
            <?php endforeach?>
            </table>
            <h5 style="color:white">Total de versement  :<?=$vers[0]?></h5>
            <h5 style="color:white">Total de retrait  :<?=$retrait[0]?></h5>
            <?php if($fin<0):?>
                <h5 style="color:red">Vous avez perdu plus que gagner</h5>
            <?php else :?>
                <h5 style="color:white">Vous avez gagner</h5>
            <?php endif?>
        </form>
        
    </div>
</body>
</html>