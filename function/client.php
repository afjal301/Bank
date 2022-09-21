<?php
function ajouter(string $num,string $nom, int $solde,string $addresse){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("INSERT INTO client(num_compte,nom,solde,addresse) VALUES ('$num','$nom','$solde','$addresse')");
    //var_dump(Affiche());

}
function select_clientByID(string $num_compte):array{
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT * FROM client where num_compte='$num_compte'");
    $resultat=$query->fetchALL(PDO::FETCH_ASSOC);
    return $resultat;
    
    
}
function del(string $num){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("DELETE FROM client where num_compte='$num'");
}
function search($nom):array{
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT * from client where nom='$nom'");
    $resultat=$query->fetchAll(PDO::FETCH_OBJ);
    return $resultat;  
}
function Affiche():array{
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT *FROM client");
    $resultat=$query->fetchALL(PDO::FETCH_ASSOC);
    return $resultat;
}
function delete($num){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("DELETE FROM client where num_compte='$num'");
}
function update(){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("DELETE FROM client where num_compte='$num'");
}
function recherche($key):array{
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT * FROM client where num_compte='$key' or addresse='$key' or nom='$key'");
    $resultat=$query->fetchALL(PDO::FETCH_ASSOC);
    return $resultat;
}
function select3(){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT num_compte , nom ,solde FROM client");
    $resultat=$query->fetchALL(PDO::FETCH_ASSOC);
    return $resultat;
}
function pdf(){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT num_compte FROM client");
    $resultat=$query->fetchAll();
    foreach($resultat as $key){
        $fichier=dirname(__DIR__).DIRECTORY_SEPARATOR."Donné".DIRECTORY_SEPARATOR.$key[0].".pdf";
        if(!file_exists($fichier)){
            touch($fichier);
        }
    }
    
       
  }
?>