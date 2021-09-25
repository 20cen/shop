<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PlanningEntity
 *
 * @author EXACTITUMNG
 */
require_once ('../core/Bean/PlanningBean.php');
require_once ('../core/dao/Connexion.php');
require_once ('../core/interfaces/IPlanning.php');
class PlanningEntity extends Bouticdata\Connexion implements IPlanning{
    public function addPlanning(\PlanningBean $plb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("insert into bt_planningchauffeur set dateplanning = ?, destination = ?, commandeid = ?");
        if ($this->isExist($plb)) {
            return ["Code"=>"180", "Message"=>["FR"=>"Cette commande existe déjà!", "EN"=>"This command already exist!"]]; 
        } else {
            if ($req->execute(array($plb->getDate(), $plb->getDestination(), $plb->getCommandeid()))) {
                return ["Code"=>"200", "Message"=>["FR"=>"Ajout effectué avec succès!", "EN"=>"Success add!"]]; 
            } else {
                return ["Code"=>"201", "Message"=>["FR"=>"Echec ajout!", "EN"=>"Add fail!"]]; 
            }
        }
    }

    public function allPlanning(): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->query("select * from bt_planningchauffeur");
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new PlanningBean();
                $bn->setCommandeid($row->commandeid);
                $bn->setDate($row->dateplanning);
                $bn->setDestination($row->destination);
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function editPlanning(\PlanningBean $plb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("update bt_planningchauffeur set destination = ?, commandeid = ? where idplanning = ?");
        if ($req->execute(array($plb->getDestination(), $plb->getCommandeid(), $plb->getId()))) {
            return ["Code"=>"200", "Message"=>["FR"=>"Modification effectuée avec succès!", "EN"=>"Success edit!"]]; 
        } else {
            return ["Code"=>"200", "Message"=>["FR"=>"Echec modification!", "EN"=>"Fail edit!"]]; 
        }
    }

    public function getPlanningByCommande(\PlanningBean $plb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_planningchauffeur where commandeid = ?");
        $req->execute(array($plb->getCommandeid()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new PlanningBean();
                $bn->setCommandeid($row->commandeid);
                $bn->setDate($row->dateplanning);
                $bn->setDestination($row->destination);
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getPlanningByDate(\PlanningBean $plb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_planningchauffeur where dateplanning = ?");
        $req->execute(array($plb->getDate()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new PlanningBean();
                $bn->setCommandeid($row->commandeid);
                $bn->setDate($row->dateplanning);
                $bn->setDestination($row->destination);
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getPlanningByDestination(\PlanningBean $plb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_planningchauffeur where destination = ?");
        $req->execute(array($plb->getDestination()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new PlanningBean();
                $bn->setCommandeid($row->commandeid);
                $bn->setDate($row->dateplanning);
                $bn->setDestination($row->destination);
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getPlanningById(\PlanningBean $plb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_planningchauffeur where idplanning = ?");
        $req->execute(array($plb->getId()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new PlanningBean();
                $bn->setCommandeid($row->commandeid);
                $bn->setDate($row->dateplanning);
                $bn->setDestination($row->destination);
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function isExist(\PlanningBean $plb): bool {
        $conn = $this->connecter();
        $req = $conn->prepare("select * from bt_planningchauffeur where commandeid = ?");
        $req->execute(array($plb->getCommandeid()));
        if ($req->rowCount()>0) {
            return true;
        } else {
            return false;
        }
        
    }

}

//$sx = new PlanningBean();
//$sx->setCommandeid(5);
//$sx->setDestination("Mfilou");
//$sx->setId(2);
//
//$ee = new PlanningEntity();
//$add = $ee->editPlanning($sx);
//echo json_encode($add);
//
//$aff = $ee->getPlanningById($sx);
//
//if (count($aff)>0) {
//    foreach ($aff as $value) {
//        echo $value->getDate().' '.$value->getDestination();
//    }
//} else {
//    echo 'Aucune donnée disponible';
//}
