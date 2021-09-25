<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Marque
 *
 * @author EXACTITUMNG
 */
require_once ('../core/interfaces/IMarqueproduit.php');
require_once ('../core/dao/Connexion.php');
require_once ('../core/Bean/MarqueBean.php');
class Marque extends Bouticdata\Connexion implements IMarqueproduit{
    public function addMarque(\MarqueBean $mb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("insert into bt_marqueproduit set labelmproduit = ?");
        if ($this->isExist($mb)) {
            return ["Code:"=>"180", "Message"=>["FR"=>"Cette marque existe déjà!", "EN"=>"Mark already exist!"]]; 
        } else {
            if ($req->execute(array($mb->getMarque()))) {
                return ["Code:"=>"200", "Message"=>["FR"=>"Marque avec succès!", "EN"=>"Mark add succefuly!"]]; 
            } else {
                return ["Code:"=>"200", "Message"=>["FR"=>"Echec ajout!", "EN"=>"Add failed!"]]; 
            }
        }
    }

    public function allMarque(): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->query("select * from bt_marqueproduit");
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $mb = new MarqueBean();
                $mb->setMarque($row->labelmproduit);
                $tab[] = $mb;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function editMarque(\MarqueBean $mb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("update bt_marqueproduit set labelmproduit = ? where idmproduit = ?");
        if ($req->execute(array($mb->getMarque(), $mb->getId()))) {
            return ["Code:"=>"200", "Message"=>["FR"=>"Marque modifiée avec succès!", "EN"=>"Mark edit succefuly!"]]; 
        } else {
            return ["Code:"=>"201", "Message"=>["FR"=>"Echec modification!", "EN"=>"Failed edit!"]]; 
        }
    }

    public function getMarqueById(\MarqueBean $mb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_marqueproduit where idmproduit = ?");
        $req->execute(array($mb->getId()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $mb = new MarqueBean();
                $mb->setMarque($row->labelmproduit);
                $tab[] = $mb;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getMarqueByLabel(\MarqueBean $mb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_marqueproduit where labelmproduit = ?");
        $req->execute(array($mb->getMarque()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $mb = new MarqueBean();
                $mb->setMarque($row->labelmproduit);
                $tab[] = $mb;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function isExist(\MarqueBean $mb): bool {
        $conn = $this->connecter();
        $req = $conn->prepare("select * from bt_marqueproduit where labelmproduit = ?");
        $req->execute(array($mb->getMarque()));
        if ($req->rowCount()>0) {
            return true;
        } else {
            return false;
        }
    }    

}

//$bean = new MarqueBean();
//$bean->setId(1);
//$bean->setMarque('Samsung');

//$ent = new Marque();
//$addd = $ent->addMarque($bean);
//
//echo json_encode($addd);

//$ss = new Marque();
//$aff = $ss->getMarqueByLabel($bean);
//if (count($aff)>0) {
//    foreach ($aff as $value) {
//        echo $value->getMarque().'<br>';
//    }
//}
