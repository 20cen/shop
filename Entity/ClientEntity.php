<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientEntity
 *
 * @author EXACTITUMNG
 */
require_once ('../core/dao/Connexion.php');
require_once ('../core/Bean/ClientBean.php');
require_once ('../core/interfaces/IClient.php');
class ClientEntity extends Bouticdata\Connexion implements IClient{
    public function activateClient(\ClientBean $cb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("update bt_client set etatc = ? where idclient = ?");
        if ($req->execute(array($cb->getEtat(), $cb->getId()))) {
            return ["Code"=>"200", "Message"=>["FR"=>"Client activé avec succès!", "EN"=>"Success activate client!"]]; 
        } else {
            return ["Code"=>"201", "Message"=>["FR"=>"Echec activation!", "EN"=>"Fail activation!"]]; 
        }
    }

    public function addClient(\ClientBean $cb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("insert into bt_client set nomc = ?, prenomc = ?, sexec = ?, telc = ?, emailc = ?, adressec = ?, paysc = ?, passc = ?");
        if ($this->isExist($cb)) {
            return ["Code"=>"180", "Message"=>["FR"=>"Ce client existe déjà!", "EN"=>"This client already exist!"]]; 
        } else {
            if ($req->execute(array($cb->getNom(), $cb->getPrenom(), $cb->getSexe(), $cb->getTel(), $cb->getEmail(), $cb->getAdresse(), $cb->getPays(), md5($cb->getPass())))) {
                return ["Code"=>"200", "Message"=>["FR"=>"Client ajouté avec succès!", "EN"=>"Success add client!"]]; 
            } else {
                return ["Code"=>"201", "Message"=>["FR"=>"Echec ajout!", "EN"=>"Fail add!"]]; 
            }
        }
    }

    public function allClient(): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->query("select * from bt_client");
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new ClientBean();
                $bn->setAdresse($row->adressec);
                $bn->setEmail($row->emailc);
                $bn->setEtat($row->etatc);
                $bn->setNom($row->nomc);
                $bn->setPays($row->paysc);
                $bn->setPrenom($row->prenomc);
                $bn->setSexe($row->sexec);
                $bn->setTel($row->telc);
                
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function changePasse(\ClientBean $cb): array {
        
    }

    public function desactivateClient(\ClientBean $cb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("update bt_client set etatc = ? where idclient = ?");
        if ($req->execute(array($cb->getEtat(), $cb->getId()))) {
            return ["Code"=>"200", "Message"=>["FR"=>"Client désactivé !", "EN"=>"Success desactivate!"]]; 
        } else {
            return ["Code"=>"201", "Message"=>["FR"=>"Echec désactivation!", "EN"=>"Fail desactivation!"]]; 
        }
    }

    public function editClient(\ClientBean $cb): array {
        $conn = $this->connecter();
        $req = $conn->prepare("update bt_client set nomc = ?, prenomc = ?, sexec = ?, telc = ?, emailc = ?, adressec = ?, paysc = ? where idclient = ?");
        if ($req->execute(array($cb->getNom(), $cb->getPrenom(), $cb->getSexe(), $cb->getTel(), $cb->getEmail(), $cb->getAdresse(), $cb->getPays(), $cb->getId()))) {
            return ["Code"=>"200", "Message"=>["FR"=>"Client modifié avec succès !", "EN"=>"Success edit!"]]; 
        } else {
            return ["Code"=>"201", "Message"=>["FR"=>"Echec modification !", "EN"=>"Fail edit!"]]; 
        }        
        
    }

    public function getClientByEtat(\ClientBean $cb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_client where etatc = ?");
        $req->execute(array($cb->getEtat()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new ClientBean();
                $bn->setAdresse($row->adressec);
                $bn->setEmail($row->emailc);
                $bn->setEtat($row->etatc);
                $bn->setNom($row->nomc);
                $bn->setPays($row->paysc);
                $bn->setPrenom($row->prenomc);
                $bn->setSexe($row->sexec);
                $bn->setTel($row->telc);
                
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getClientById(\ClientBean $cb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_client where idclient = ?");
        $req->execute(array($cb->getId()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new ClientBean();
                $bn->setAdresse($row->adressec);
                $bn->setEmail($row->emailc);
                $bn->setEtat($row->etatc);
                $bn->setNom($row->nomc);
                $bn->setPays($row->paysc);
                $bn->setPrenom($row->prenomc);
                $bn->setSexe($row->sexec);
                $bn->setTel($row->telc);
                $bn->setId($row->idclient);
                
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getClientByNameOrFname(\ClientBean $cb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_client where nomc = ? or prenomc = ?");
        $req->execute(array($cb->getNom(), $cb->getPrenom()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new ClientBean();
                $bn->setAdresse($row->adressec);
                $bn->setEmail($row->emailc);
                $bn->setEtat($row->etatc);
                $bn->setNom($row->nomc);
                $bn->setPays($row->paysc);
                $bn->setPrenom($row->prenomc);
                $bn->setSexe($row->sexec);
                $bn->setTel($row->telc);
                
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getClientByPays(\ClientBean $cb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_client where paysc = ?");
        $req->execute(array($cb->getPays()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new ClientBean();
                $bn->setAdresse($row->adressec);
                $bn->setEmail($row->emailc);
                $bn->setEtat($row->etatc);
                $bn->setNom($row->nomc);
                $bn->setPays($row->paysc);
                $bn->setPrenom($row->prenomc);
                $bn->setSexe($row->sexec);
                $bn->setTel($row->telc);
                
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getClientByPhone(\ClientBean $cb): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_client where telc = ?");
        $req->execute(array($cb->getTel()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bn = new ClientBean();
                $bn->setAdresse($row->adressec);
                $bn->setEmail($row->emailc);
                $bn->setEtat($row->etatc);
                $bn->setNom($row->nomc);
                $bn->setPays($row->paysc);
                $bn->setPrenom($row->prenomc);
                $bn->setSexe($row->sexec);
                $bn->setTel($row->telc);
                
                $tab[] = $bn;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function isExist(\ClientBean $cb): bool {
        $conn = $this->connecter();
        $req = $conn->prepare("select * from bt_client where telc = ?");
        $req->execute(array($cb->getTel()));
        if ($req->rowCount()>0) {
            return true;
        } else {
            return false;
        }
    }

    public function login(\ClientBean $cb): array {
       $conn = $this->connecter();
       $en = new ClientEntity();
       $vars = $en->getClientByPhone($cb);
       if (count($vars)<=0) {
           return ["Code"=>"180", "Message"=>["FR"=>"Téléphone incorrect !", "EN"=>"Incorrect phone!"]]; 
       } else {
           if ($cb->setPass($vars[0]->pass) != $cb->getPass()) {
              return ["Code"=>"181", "Message"=>["FR"=>"Mot de passe incorrect!", "EN"=>"Incorrect password!"]];  
           } else {
               session_start();
               $_SESSION['client'] = $vars;
               return ["Code"=>"200", "Message"=>["FR"=>"Connexion réussie!", "EN"=>"Success connect!"]]; 
           }
       }
    }

}

//$vs = new ClientBean();
//$vs->setAdresse('Mfilou');
//$vs->setEmail($email);
//$vs->setEtat(1);
//$vs->setNom('Salas');
//$vs->setPass(md5('0000'));
//$vs->setPays('Congo');
//$vs->setPrenom('20cent');
//$vs->setSexe('M');
//$vs->setTel('068583366');
//$vs->setId(2);
//
//$ee = new ClientEntity();
//$add = $ee->login($vs);
//echo json_encode($add);
//
//$donnee = $_SESSION['client'];
//echo $donnee[0]->getTel();

//$aff = $ee->getClientByPays($vs);
//if (count($aff)>0) {
//    foreach ($aff as $value) {
//        echo $value->getNom().' '.$value->getPrenom().'<br>';
//        
//    }
//}
