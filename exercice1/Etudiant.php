<?php


class Etudiant {
    private $name ;
    private $notes=array() ;

    public function __construct(string $name ,...$args){
        $this->name=$name;
        for ($i =0; $i<count($args);$i++){
            $this->notes[$i]=$args[$i];
        }

    }
    public function afficher(){
        echo "L'etudiant : ".$this->name."/n";
        foreach($this->notes as $note){
            echo $note;
        }

    }
    public function getName(){
        return $this->name;
    }
    public function getNotes():array{
        return $this->notes;
    }


    public function Calcule_moy():float{
        $moy=0;
        foreach($this->notes as $note){
            $moy+=$note;
        }
        return $moy/count($this->notes);
    }
    public function  AdmisOuNon():void{
        if($this->Calcule_moy()<10){
            echo "non Admis";
        }else{
            echo "Admis";
        }
    }
    


}
$Aymen =new Etudiant("Aymen", 11, 13, 18, 7,10,13,2,5,1);
$Skander=new Etudiant( "Skander",15,9,8,16);
$Hamza=new Etudiant( "Hamza",15,9,12,20,19,11,4,16);


?>