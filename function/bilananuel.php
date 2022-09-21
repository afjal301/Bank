<?php
function mouvment_retraitA(int $anne){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT SUM(retrait) FROM mouvement  WHERE date_mouvement LIKE '$anne%'");
    $resultat=$query->fetchALL(PDO::FETCH_ASSOC);
    return $resultat;
}
function mouvement_verserA(int $anne){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT SUM(versement) FROM mouvement  WHERE date_mouvement LIKE '$anne%'");
    $resultat=$query->fetchALL(PDO::FETCH_ASSOC);
    return $resultat;
}

?>