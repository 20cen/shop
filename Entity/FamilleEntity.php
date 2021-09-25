<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FamilleEntity
 *
 * @author EXACTITUMNG
 */
require_once ('../core/interfaces/IFamilleproduit.php');
require_once ('../core/dao/Connexion.php');
require_once ('../core/Bean/FamilleBean.php');
class FamilleEntity extends Bouticdata\Connexion implements IFamilleproduit{
    public function addFamille(FamilleBean $fb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("insert into bt_famille set labelfamille = ?");
        if ($this->isExist($fb)) {
            return ["Code:"=>"180", "Message"=>["FR"=>"Cette famille existe déjà!", "EN"=>"This familly already exist!"]];
        } else {
            if ($req->execute(array($fb->getFamille()))){
                return ["Code:"=>"200", "Message"=>["FR"=>"Famille ajoutée avec succès!", "EN"=>"Familly add succefuly!"]];
            } else {
                return ["Code:"=>"201", "Message"=>["FR"=>"Echec ajout", "EN"=>"TAdd failed!"]];
            }
        }
    }

    public function allFamille(): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->query("select * from bt_famille");
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $fb = new FamilleBean();
                $fb->setFamille($row->labelfamille);
                $tab[] = $fb;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function editFamille(\FamilleBean $fb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("update bt_famille set labelfamille = ? where idfamille = ?");
        if ($req->execute(array($fb->getFamille(), $fb->getId()))) {
            return ["Code:"=>"200", "Message"=>["FR"=>"Famille modifiée avec succès!", "EN"=>"Familly modified succefuly!"]];
        } else {
            return ["Code:"=>"201", "Message"=>["FR"=>"Echec modification!", "EN"=>"Failed edit!"]];
        }
    }

    public function getFamilleById(FamilleBean $fb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_famille where idfamille = ?");
        $req->execute(array($fb->getId()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $fb = new FamilleBean();
                $fb->setFamille($row->labelfamille);
                $tab[] = $fb;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getFamilleByLabel(FamilleBean $fb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_famille where labelfamille = ?");
        $req->execute(array($fb->getFamille()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $fb = new FamilleBean();
                $fb->setFamille($row->labelfamille);
                $tab[] = $fb;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function isExist(FamilleBean $fb): bool {
        $conn = $this->connecter();
        $req = $conn->prepare("select * from bt_famille where labelfamille = ?");
        $req->execute(array($fb->getFamille()));
        if ($req->rowCount()>0) {
            return true;
        } else {
            return false;
        }
    }

}

//$vf = new FamilleBean();
//$vf->setFamille("Play");
//
//$ent = new FamilleEntity();
//$add = $ent->addFamille($vf);
//echo json_encode($add);

//$vc = new FamilleEntity();
//$affiche=$vc->allFamille();
//if (count($affiche)>0) {
//    foreach ($affiche as $value) {
//        echo $value->getFamille().'<br>';
//    }
//}

//$re = new FamilleBean();
//$re->setFamille("Segua");
//$re->setId(2);
//
//$e = new FamilleEntity();
//$edit = $e->editFamille($re);
//echo json_encode($edit);