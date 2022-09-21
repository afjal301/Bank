<?php
class Transfert{
    private $numexp;
    private $numrcp;
    private $somme;

    public function __construct(string $numexp,string $numrcp,int $somme){
        $this->numexp=$numexp;
        $this->numrcp=$numrcp;
        $this->somme=$somme;

    }
    public function pdo(){
        $host='localhost';
        $dbname='bank';
        $username='root';
        $password='';
        $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        $error=[];
        //soustraire une somme à l'expediteur
        
        $query=$pdo->query("SELECT solde FROM client where num_compte='$this->numexp' ");
        $resultat=$query->fetch();
        if(empty($resultat)){
            $error["compte expediteur"]="Cette compte d'expdediteur n'existe pas ";
        }
        else{
            $solde_exp=intval($resultat["solde"]);
            if($solde_exp>=$this->somme){
                $new_solde_exp=$solde_exp-$this->somme;
                $solde=$pdo->query("UPDATE client SET solde='$new_solde_exp' where num_compte='$this->numexp'");
                        //ajouter somme à la recepteur
                $query2=$pdo->query("SELECT solde FROM client where num_compte='$this->numrcp' ");
                $resultat2=$query2->fetch();
                if(empty($resultat2)){
                    $error["compte recepteur"]="Cette compte recepteur n'existe pas";
                }
                else{
                    $solde_rcp=intval($resultat2["solde"]);
                    $new_solde_rcp=$solde_rcp+$this->somme;
                    $solde2=$pdo->query("UPDATE client SET solde='$new_solde_rcp' where num_compte='$this->numrcp'");
                }
                
            }
            else{
                $error["somme"]="vous n'avez pas cette somme";
            }
            
        }
        return $error;
   
    }
}

?>