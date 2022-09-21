<?php
require_once "function/mouvement.php";
require_once "function/client.php";
$mouvement=null;
$total_retrait=null;
$resultat=null;
$fic=isset($_GET["search"])?$_GET["search"]:"";

if(isset($_GET["search"]) && $_GET["search"]!==""){
    
    $mouvement=select_mouvement($_GET["search"]);
    $resultat=select_clientByID($_GET["search"]);
    if(!empty($mouvement)){
        $host='localhost';
        $dbname='bank';
        $username='root';
        $password='';
        $num_compte=$mouvement[0]["num_compte"];
        $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        $query=$pdo->query("SELECT SUM(versement) FROM mouvement where num_compte='$num_compte'");
        $query2=$pdo->query("SELECT SUM(retrait) FROM mouvement where num_compte='$num_compte'");
        $total_retrait=$query2->fetch();
        $versement=$query->fetch();
        $val=intval($resultat[0]["solde"]);
        $total_versement= intval($total_retrait[0])+$val;

    }
   

    //$total_retrait=intval(total_retrait($mouvement[0]["num_compte"]));


}
else{
    $mouvement=select_mouvement("C1"); 
    //$total_retrait=total_retrait($mouvement[0]["num_compte"]);
    
}

    

        
        //var_dump($resultat);
        
        $mv=select_allmouvement();
        foreach($mv as $key){
            $id=$key["num_compte"];
            $info=select_clientByID($id);
            $fichier=__DIR__.DIRECTORY_SEPARATOR."Donné".DIRECTORY_SEPARATOR.$id.".pdf";
            file_put_contents($fichier,json($key["num_compte"],$info[0]["nom"] ,$key["retrait"] ,$key["versement"] ,$key["date_mouvement"],$key["num_mouvement"]).PHP_EOL,FILE_APPEND);
        }
        
        $file=__DIR__.DIRECTORY_SEPARATOR."Donné".DIRECTORY_SEPARATOR.$fic.".pdf";
        





//$query=$pdo->query("SELECT client.nom,client.num_compte,client.solde,verser.num_versement,retrai.num_retrait,verser.montant_versement,retrai.montant_retrait,retrai.date_retrait,verser.date_versement FROM verser,retrai,client WHERE client.num_compte=verser.num_compte and client.num_compte=retrai.num_compte; ")

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etat e situation BANCAIRE</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <script src="boostrap/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <script src="boostrap/js/jquery.min.js"></script>
</head>
<body>
    <div class="situation1">
        <h1>Situation BANCAIRE</h1>
        <a href="menu.php" > <button class="btn btn-danger" style="margin-left: -8cm;margin-right: 4cm;width: 4cm;">TO MENU</button></a>
        <a href="rechercheClient.php"> <button class="btn btn-primary" style="margin-left: -8cm;margin-right: 4cm;margin-top: 3cm;width: 4cm;">Retour</button></a>
        <a href="BilanA.php"> <button class="btn btn-primary" style="margin-left: -8cm;margin-right: 4cm;margin-top: 3cm;width: 4cm;">Bilan</button></a>
        <form action="" class="form-group">
            <input type="text" name="search" id="" class="form-control" placeholder="Recherche ....">
            <button type="submit" class="btn btn-primary" style="margin-top:0.5cm;margin-bottom: 1cm;">Recherche</button>
            <?php if(file_exists($file)):?>
                <h3>Numero du Compte : <?=$resultat["0"]["num_compte"]?></h3>
                <h3>Nom : <?=$resultat["0"]["nom"]?> </h3>
                <h3>Solde Actuel : <?=$resultat["0"]["solde"]?> </h3>
            <?php endif?>
            
            <table class="table">
                <tr>
                    <td style="background-color: rgb(138, 16, 16);">Numero versement ou Retrait</td>
                    <td style="background-color: rgb(0, 183, 255);">Versement</td>
                    <td style="background-color: rgb(0, 183, 255);">Retrait</td>
                    <td style="background-color: rgb(0, 183, 255);">Date</td>
                </tr>
                <?php if(!empty($mouvement)):?>
                    <?php foreach($mouvement as $key):?>
                <tr>
                    <td><?=$key["num_mouvement"]?></td>
                    <td><?=$key["versement"]?></td>
                    <td><?=$key["retrait"]?></td>
                    <td><?=$key["date_mouvement"]?></td>
                </tr>
                <?php endforeach?>
                <?php else:?>
                    <h5 class="alert alert-danger">Cette client n'existe pas ou il n'a jamais faire de_mouvement</h5>
                <?php endif?>
                
            </table>
            <?php if(file_exists($file)):?>
            <h3>Total versement : <?=$total_versement?>  </h3>
            <h3>Total Retrait   : <?=$total_retrait[0]?> </h3>
            <h3>versement après l'ouverture de compte: <?=$versement[0]?>  </h3>
            <?php endif?>
        </form>
    </div>
</body>
</html>