<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommandeEntity
 *
 * @author EXACTITUMNG
 */
require_once ('../core/Bean/CommandeBean.php');
require_once ('../core/dao/Connexion.php');
require_once ('../core/interfaces/ICommande.php');
class CommandeEntity extends Bouticdata\Connexion implements ICommande{
    public function addCommande(\CommandeBean $cb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("insert into bt_commande set paye = ?, chaffeur = ?, produitid = ?, quantitecmd = ?, clientid = ?");
        if ($this->isExist($cb)) {
            return ["Code"=>"180", "Message"=>["FR"=>"Cette commande existe!", "EN"=>"This command already exist!"]]; 
        } else {
            if ($req->execute(array($cb->getPaye(), $cb->getChauffeur(), $cb->getProduitid(), $cb->getQuantite(), $cb->getClientid()))) {
                return ["Code"=>"200", "Message"=>["FR"=>"Ajout effectué avec succès!", "EN"=>"Success add!"]]; 
            } else {
                return ["Code"=>"201", "Message"=>["FR"=>"Echec ajout!", "EN"=>"Edit fail!"]]; 
            }
        }
    }

    public function allCommande(): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->query("select * from bt_commande");
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new CommandeBean();
                $bn->setId($row->idcommande);
                $bn->setPaye($row->paye);
                $bn->setChauffeur($row->chaffeur);
                $bn->setProduitid($row->produitid);
                $bn->setQuantite($row->quantitecmd);
                $bn->setClientid($row->clientid);
                $bn->setDate($row->datecmd);
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function editCommande(\CommandeBean $cb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("update bt_commande set paye = ?, chaffeur = ?, produitid = ?, quantitecmd = ?, clientid = ? where idcommande = ?");
        if ($req->execute(array($cb->getPaye(), $cb->getChauffeur(), $cb->getProduitid(), $cb->getQuantite(), $cb->getClientid(), $cb->getId()))) {
            return ["Code"=>"200", "Message"=>["FR"=>"Modification effectuée avec succès!", "EN"=>"Success edit!"]]; 
        } else {
            return ["Code"=>"201", "Message"=>["FR"=>"Echec modification!", "EN"=>"Edit fail!"]]; 
        }
    }

    public function getCommandeByChauffeur(\CommandeBean $cb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_commande where chauffeur = ?");
        $req->execute(array($cb->getChauffeur()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new CommandeBean();
                $bn->setPaye($row->paye);
                $bn->setChauffeur($row->chaffeur);
                $bn->setProduitid($row->produitid);
                $bn->setQuantite($row->quantitecmd);
                $bn->setClientid($row->clientid);
                $bn->setDate($row->datecmd);
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getCommandeByClient(\CommandeBean $cb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_commande where clientid = ?");
        $req->execute(array($cb->getClientid()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new CommandeBean();
                $bn->setPaye($row->paye);
                $bn->setChauffeur($row->chaffeur);
                $bn->setProduitid($row->produitid);
                $bn->setQuantite($row->quantitecmd);
                $bn->setClientid($row->clientid);
                $bn->setDate($row->datecmd);
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        } 
    }

    public function getCommandeByDate(\CommandeBean $cb): array {
         $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_commande where datecmd = ?");
        $req->execute(array($cb->getDate()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new CommandeBean();
                $bn->setPaye($row->paye);
                $bn->setChauffeur($row->chaffeur);
                $bn->setProduitid($row->produitid);
                $bn->setQuantite($row->quantitecmd);
                $bn->setClientid($row->clientid);
                $bn->setDate($row->datecmd);
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getCommandeById(\CommandeBean $cb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_commande where idcommande = ?");
        $req->execute(array($cb->getId()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new CommandeBean();
                $bn->setPaye($row->paye);
                $bn->setChauffeur($row->chaffeur);
                $bn->setProduitid($row->produitid);
                $bn->setQuantite($row->quantitecmd);
                $bn->setClientid($row->clientid);
                $bn->setDate($row->datecmd);
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getCommandeByPaye(\CommandeBean $cb): array {
         $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_commande where paye = ?");
        $req->execute(array($cb->getPaye()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new CommandeBean();
                $bn->setPaye($row->paye);
                $bn->setChauffeur($row->chaffeur);
                $bn->setProduitid($row->produitid);
                $bn->setQuantite($row->quantitecmd);
                $bn->setClientid($row->clientid);
                $bn->setDate($row->datecmd);
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getCommandeByProduit(\CommandeBean $cb): array {
         $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_commande where produitid = ?");
        $req->execute(array($cb->getProduitid()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new CommandeBean();
                $bn->setPaye($row->paye);
                $bn->setChauffeur($row->chaffeur);
                $bn->setProduitid($row->produitid);
                $bn->setQuantite($row->quantitecmd);
                $bn->setClientid($row->clientid);
                $bn->setDate($row->datecmd);
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function isExist(\CommandeBean $cb): bool {
       $conn = $this->connecter();
       $req = $conn->prepare("select * from bt_commande where produitid = ?");
       $req->execute(array($cb->getProduitid()));
       if ($req->rowCount()>0) {
           return true;
       } else {
           return false;
       }
    }

}

//$vi = new CommandeBean();
//$vi->setChauffeur(0);
//$vi->setClientid(1);
//$vi->setProduitid(2);
//$vi->setQuantite(2);
//$vi->setPaye(0);
//$vi->setId(5);

//$en = new CommandeEntity();
//$add = $en->addCommande($vi);
//echo json_encode($add);
//
//$aff = $en->getCommandeByClient($vi);
//if (count($aff)>0) {
//    foreach ($aff as $value) {
//        echo $value->getQuantite().'<br>'; 
//    }
//} else {
//    echo 'Aucune donnée trouvée';
//}
