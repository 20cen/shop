<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeEntity
 *
 * @author EXACTITUMNG
 */
require_once ('../core/interfaces/ITypeproduit.php');
require_once ('../core/dao/Connexion.php');
require_once ('../core/Bean/Typebean.php');
class TypeEntity extends Bouticdata\Connexion implements ITypeproduit{
    public function addType(\Typebean $tb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("insert into bt_typeproduit set labeltproduit = ?");
        if ($this->isExist($tb)) {
            return ["Code"=>"180", "Message"=>["FR"=>"Ce type existe déjà!", "EN"=>"This type exist!"]];
        } else {
            if ($req->execute(array($tb->getType()))) {
                return ["Code"=>"200", "Message"=>["FR"=>"Type ajouté avec succès!", "EN"=>"Type succeful add!"]];
            } else {
                return ["Code"=>"201", "Message"=>["FR"=>"Echec ajout!", "EN"=>"Failed add!"]];
            }
        }
    }

    public function allType(): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->query("select * from bt_typeproduit");
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bb = new Typebean();
                $bb->setId($row->idtproduit);
                $bb->setType($row->labeltproduit);
                $tab[] = $bb;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function editType(\Typebean $tb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("update bt_typeproduit set labeltproduit = ? where idtproduit = ?");
        if ($req->execute(array($tb->getType(), $tb->getId()))) {
           return ["Code"=>"200", "Message"=>["FR"=>"Type modifié avec succès!", "EN"=>"Succeful edit!"]]; 
        } else {
            return ["Code"=>"201", "Message"=>["FR"=>"Echec ajout!", "EN"=>"Failed edit!"]];
        }
    }

    public function getTYpeByLabel(\Typebean $tb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_typeproduit where labeltproduit = ?");
        $req->execute(array($tb->getType()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bean = new Typebean();
                $bean->setId($row->idtproduit);
                $bean->setType($row->labeltproduit);
                $tab[] = $bean;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getTypeById(\Typebean $tb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_typeproduit where idtproduit = ?");
        $req->execute(array($tb->getId()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bean = new Typebean();
                $bean->setId($row->idtproduit);
                $bean->setType($row->labeltproduit);
                $tab[] = $bean;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function isExist(\Typebean $tb): bool {
        $conn = $this->connecter();
        $req = $conn->prepare("select * from bt_typeproduit where labeltproduit = ?");
        $req->execute(array($tb->getType()));
        if ($req->rowCount()>0) {
            return true;
        } else {
            return false;
        }
    }

}

//$vv = new Typebean();
//$vv->setId(2);
//$vv->setType("Divers");

//$en = new TypeEntity();
//$add = $en->editType($vv);
//echo json_encode($add);

//$aff = $en->getTYpeByLabel($vv);
//if (count($aff)>0) {
//    foreach ($aff as $value) {
//        echo $value->getId().'<br>';
//    }
//} else {
//    echo 'Aucune donnée trouvée!';
//}
