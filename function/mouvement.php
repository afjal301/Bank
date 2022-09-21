<?php
function mouvement_retrait($num_compte,$date_retrait,$montant_retrait){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("INSERT INTO mouvement(num_compte,date_mouvement,retrait ) VALUES ('$num_compte','$date_retrait','$montant_retrait')");
}
function mouvement_versement($num_compte,$date_versement,$montant_versement){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("INSERT INTO mouvement(num_compte,date_mouvement,versement) VALUES('$num_compte','$date_versement','$montant_versement')");
}
function select_allmouvement(){
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT *  from mouvement ");
    $resultat=$query->fetchALL(PDO::FETCH_ASSOC);
    return $resultat;
}
function select_mouvement($num_compte):array{
    $host='localhost';
    $dbname='bank';
    $username='root';
    $password='';
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $query=$pdo->query("SELECT *  from mouvement where num_compte='$num_compte'");
    $resultat=$query->fetchALL(PDO::FETCH_ASSOC);
    return $resultat;

}
function select_compte($num_compte){
        $host='localhost';
        $dbname='bank';
        $username='root';
        $password='';
        $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        $query=$pdo->query("SELECT *  from client where num_compte='$num_compte'");
        $resultat=$query->fetch();
        return $resultat;
}
/*function total_retrait($num_compte):int{
        $host='localhost';
        $dbname='bank';
        $username='root';
        $password='';
        $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        $query=$pdo->query("SELECT SUM(versement) FROM mouvement");
        $resultat=$query->fetch();

        
        return $query;
}*/
function json($num ,$nom ,$retrait ,$versement ,$date,$mouvement):string{
    return json_encode([

        "Numero de Compte"=>$num,
        "Nom de Compte"=>$nom,
        "retrait"=>$retrait,
        "versement"=>$versement,
        "Date de mouvement"=>$date,
        "Numero de mouvement"=>$mouvement
    ]
    );
}


?>