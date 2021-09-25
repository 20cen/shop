<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProduitEntity
 *
 * @author EXACTITUMNG
 */
require_once ('../core/interfaces/IProduit.php');
require_once ('../core/Bean/ProduitBean.php');
require_once ('../core/dao/Connexion.php');
class ProduitEntity extends Bouticdata\Connexion implements IProduit {
    public function addProduit(\ProduitBean $pb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("insert into bt_produit set labelproduit = ?, prix = ?, detail = ?, stock = ?, photo = ?, mproduitid = ?, tproduitid = ?, familleid = ?");
        if ($this->isExist($pb)) {
            return ["Code"=>"180", "Message"=>["FR"=>"Ce produit existe déjà!", "EN"=>"This product already exist!"]];
        } else {
            if ($req->execute(array($pb->getLabel(), $pb->getPrix(), $pb->getDetail(), $pb->getStock(), $pb->getImage(), $pb->getMproduitid(), $pb->getTproduitid(), $pb->getFproduitid()))) {
               return ["Code"=>"200", "Message"=>["FR"=>"Ajout effectué avec succès!", "EN"=>"Success add!"]]; 
            } else {
                return ["Code"=>"201", "Message"=>["FR"=>"Echec ajout!", "EN"=>"Failed add!"]];
            }
        }
    }

    public function allProduit(): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->query("select * from bt_produit");
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new ProduitBean();
                $bn->setLabel($row->labelproduit);
                $bn->setPrix($row->prix);
                $bn->setDetail($row->detail);
                $bn->setStock($row->stock);
                $bn->setImage($row->photo);
                $bn->setMproduitid($row->mproduitid);
                $bn->setTproduitid($row->tproduitid);
                $bn->setFproduitid($row->familleid);
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function editProduit(\ProduitBean $pb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("update bt_produit set labelproduit = ?, prix = ?, detail = ?, stock = ?, mproduitid = ?, tproduitid = ?, familleid = ? where idproduit = ?");
        if ($req->execute(array($pb->getLabel(), $pb->getPrix(), $pb->getDetail(), $pb->getStock(), $pb->getMproduitid(), $pb->getTproduitid(), $pb->getFproduitid(), $pb->getId()))) {
            return ["Code"=>"200", "Message"=>["FR"=>"Modification effectuée avec succès!", "EN"=>"Success edit!"]]; 
        } else {
            return ["Code"=>"201", "Message"=>["FR"=>"Echec modification!", "EN"=>"Edit fail!"]]; 
        }
    }

    public function getProduitByFamille(\ProduitBean $pb): array {
       $conn = $this->connecter();
       $req = $conn->prepare("select * from bt_produit where familleid = ?");
       $req->execute(array($pb->getFproduitid()));
       if ($req->rowCount()>0) {
          while ($row = $req->fetch(5)) {
                $bn = new ProduitBean();
                $bn->setLabel($row->labelproduit);
                $bn->setPrix($row->prix);
                $bn->setDetail($row->detail);
                $bn->setStock($row->stock);
                $bn->setImage($row->photo);
                $bn->setMproduitid($row->mproduitid);
                $bn->setTproduitid($row->tproduitid);
                $bn->setFproduitid($row->familleid);
                $tab[] = $bn;
            }
            return $tab; 
       }
    }

    public function getProduitById(\ProduitBean $pb): array {
       $conn = $this->connecter();
       $req = $conn->prepare("select * from bt_produit where idproduit = ?");
       $req->execute(array($pb->getId()));
       if ($req->rowCount()>0) {
          while ($row = $req->fetch(5)) {
                $bn = new ProduitBean();
                $bn->setLabel($row->labelproduit);
                $bn->setPrix($row->prix);
                $bn->setDetail($row->detail);
                $bn->setStock($row->stock);
                $bn->setImage($row->photo);
                $bn->setMproduitid($row->mproduitid);
                $bn->setTproduitid($row->tproduitid);
                $bn->setFproduitid($row->familleid);
                $tab[] = $bn;
            }
            return $tab; 
       } 
    }

    public function getProduitByLabel(\ProduitBean $pb): array {
        $conn = $this->connecter();
       $req = $conn->prepare("select * from bt_produit where labelproduit = ?");
       $req->execute(array($pb->getLabel()));
       if ($req->rowCount()>0) {
          while ($row = $req->fetch(5)) {
                $bn = new ProduitBean();
                $bn->setLabel($row->labelproduit);
                $bn->setPrix($row->prix);
                $bn->setDetail($row->detail);
                $bn->setStock($row->stock);
                $bn->setImage($row->photo);
                $bn->setMproduitid($row->mproduitid);
                $bn->setTproduitid($row->tproduitid);
                $bn->setFproduitid($row->familleid);
                $tab[] = $bn;
            }
            return $tab; 
       }
    }

    public function getProduitByMarque(\ProduitBean $pb): array {
        $conn = $this->connecter();
       $req = $conn->prepare("select * from bt_produit where mproduitid = ?");
       $req->execute(array($pb->getMproduitid()));
       if ($req->rowCount()>0) {
          while ($row = $req->fetch(5)) {
                $bn = new ProduitBean();
                $bn->setLabel($row->labelproduit);
                $bn->setPrix($row->prix);
                $bn->setDetail($row->detail);
                $bn->setStock($row->stock);
                $bn->setImage($row->photo);
                $bn->setMproduitid($row->mproduitid);
                $bn->setTproduitid($row->tproduitid);
                $bn->setFproduitid($row->familleid);
                $tab[] = $bn;
            }
            return $tab; 
       }
    }

    public function getProduitByStock(\ProduitBean $pb): array {
        $conn = $this->connecter();
       $req = $conn->prepare("select * from bt_produit where stock = ?");
       $req->execute(array($pb->getStock()));
       if ($req->rowCount()>0) {
          while ($row = $req->fetch(5)) {
                $bn = new ProduitBean();
                $bn->setLabel($row->labelproduit);
                $bn->setPrix($row->prix);
                $bn->setDetail($row->detail);
                $bn->setStock($row->stock);
                $bn->setImage($row->photo);
                $bn->setMproduitid($row->mproduitid);
                $bn->setTproduitid($row->tproduitid);
                $bn->setFproduitid($row->familleid);
                $tab[] = $bn;
            }
            return $tab; 
       }
    }

    public function getProduitByType(\ProduitBean $pb): array {
        $conn = $this->connecter();
       $req = $conn->prepare("select * from bt_produit where tproduitid = ?");
       $req->execute(array($pb->getTproduitid()));
       if ($req->rowCount()>0) {
          while ($row = $req->fetch(5)) {
                $bn = new ProduitBean();
                $bn->setLabel($row->labelproduit);
                $bn->setPrix($row->prix);
                $bn->setDetail($row->detail);
                $bn->setStock($row->stock);
                $bn->setImage($row->photo);
                $bn->setMproduitid($row->mproduitid);
                $bn->setTproduitid($row->tproduitid);
                $bn->setFproduitid($row->familleid);
                $tab[] = $bn;
            }
            return $tab; 
       }
    }

    public function isExist(\ProduitBean $pb): bool {
        $conn = $this->connecter();
        $req = $conn->prepare("select * from bt_produit where labelproduit = ? and mproduitid = ? and tproduitid = ? and familleid = ?");
        $req->execute(array($pb->getLabel(), $pb->getMproduitid(), $pb->getTproduitid(), $pb->getFproduitid()));
        if ($req->rowCount()>0) {
            return true;
        } else {
            return false;
        }
    }

}

//$vv = new ProduitBean();
//$vv->setLabel('Play 3');
//$vv->setPrix('75000');
//$vv->setStock(9);
//$vv->setImage('5468545458');
//$vv->setDetail('N/S');
//$vv->setMproduitid(1);
//$vv->setTproduitid(1);
//$vv->setFproduitid(1);
//$vv->setId(2);
//
//$ee = new ProduitEntity();
//$add = $ee->addProduit($vv);
//echo json_encode($add);

//$edit = $ee->editProduit($vv);
//echo json_encode($edit);
//
//$aff = $ee->getProduitByFamille($vv);
//if (count($aff)>0) {
//    foreach ($aff as $value) {
//        echo $value->getLabel().'<br>';
//    }
//}
