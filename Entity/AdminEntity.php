<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminEntity
 *
 * @author EXACTITUMNG
 */
require_once ('../core/interfaces/IAdmin.php');
require_once ('../core/dao/Connexion.php');
require_once ('../core/Bean/AdminBean.php');
class AdminEntity extends Bouticdata\Connexion implements IAdmin {
    public function addAdmin(\AdminBean $ab): array {
        $conn = $this->connecter();
        $req = $conn->prepare("insert into bt_adminsystem set nomas = ?, prenomas = ?, telas = ?, passas = ?");
        if ($this->isExist($ab)) {
            return ["Code"=>"180", "Message"=>["FR"=>"Cet administrateur existe déjà!", "EN"=>"This administrateur exist!"]];
        } else {
            if ($req->execute(array($ab->getNom(), $ab->getPrenom(), $ab->getTel(), $ab->getPass()))) {
               return ["Code"=>"200", "Message"=>["FR"=>"Administrateur ajouté avec succès!", "EN"=>"Administrateur succeful add!"]]; 
            } else {
                return ["Code"=>"201", "Message"=>["FR"=>"Echec ajout!", "EN"=>"Failed add!"]];
            }
        }
    }

    public function allAdmin(): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->query("select * from bt_adminsystem");
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bb = new AdminBean();
                $bb->setId($row->idadminas);
                $bb->setNom($row->nomas);
                $bb->setPrenom($row->prenomas);
                $bb->setTel($row->telas);
                $tab[] = $bb;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function changePass(\AdminBean $ab): array {
        $conn = $this->connecter();
        $req = $conn->prepare("update bt_adminsystem set pass = ? where telas = ?");
    }

    public function editAdmin(\AdminBean $ab): array {
        $conn = $this->connecter();
        $req = $conn->prepare("update bt_adminsystem set nomas = ?, prenomas = ? where idadminas = ?");
        if ($req->execute(array($ab->getNom(), $ab->getPrenom(), $ab->getId()))) {
            return ["Code"=>"200", "Message"=>["FR"=>"Modification effectuée avec succès!", "EN"=>"Edit succefuly!"]];
        } else {
            return ["Code"=>"201", "Message"=>["FR"=>"Echec modification!", "EN"=>"Failed edit!"]];                
            }        
    }

    public function getAdminById(\AdminBean $ab): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_adminsystem where idadmisas = ?");
        $req->execute(array($ab->getId()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bb = new AdminBean();
                $bb->setId($row->idadminas);
                $bb->setNom($row->nomas);
                $bb->setPrenom($row->prenomas);
                $bb->setTel($row->telas);
                $tab[] = $bb;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getAdminByNameOrFname(\AdminBean $ab): array {
        $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_adminsystem where nomas = ? or prenomas = ?");
        $req->execute(array($ab->getNom(), $ab->getPrenom()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bb = new AdminBean();
                $bb->setId($row->idadminas);
                $bb->setNom($row->nomas);
                $bb->setPrenom($row->prenomas);
                $bb->setTel($row->telas);
                $tab[] = $bb;
            }
            return $tab;
        } else {
            return $tab;
        }
    }

    public function getAdminByTel(\AdminBean $ab): array {
       $conn = $this->connecter();
        $tab = array();
        $req = $conn->prepare("select * from bt_adminsystem where telas = ?");
        $req->execute(array($ab->getTel()));
        if ($req->rowCount()>0) {
            while ($row = $req->fetch(5)) {
                $bb = new AdminBean();
                $bb->setId($row->idadminas);
                $bb->setNom($row->nomas);
                $bb->setPrenom($row->prenomas);
                $bb->setTel($row->telas);
                $tab[] = $bb;
            }
            return $tab;
        } else {
            return $tab;
        } 
    }

    public function isExist(\AdminBean $ab): bool {
        $conn = $this->connecter();
        $req = $conn->prepare("select * from bt_adminsystem where telas = ?");
        $req->execute(array($ab->getTel()));
        if ($req->rowCount()>0) {
            return true;
        } else {
            return false;
        }
    }

    public function changeTel(\AdminBean $ab): array {
        $conn = $this->connecter();
        $req = $conn->prepare("update bt_adminsystem set telas = ? where idadminas = ?");
        if ($this->isExist($ab)) {
             return ["Code"=>"180", "Message"=>["FR"=>"Ce numéro exite déjà!", "EN"=>"This phone number already exist!"]];
        } else {
            if ($req->execute(array($ab->getTel()))) {
                 return ["Code"=>"200", "Message"=>["FR"=>"Numéro modification effectuée avec succès!", "EN"=>"Phone number edit succefuly!"]];
            } else {
                 return ["Code"=>"201", "Message"=>["FR"=>"Echec de modification!", "EN"=>"Failed edit!"]];
            }
        }
    }

    public function login(\AdminBean $ab): array {
        $conn = $this->connecter();
        $req = $conn->prepare("select * from bt_adminsystem where telas = ?");
        $req->execute(array($ab->getTel()));
        if ($req->rowCount()>0) {
            if ($ab->setPass($pass) != md5($ab->getPass())) {
               return ["Code"=>"181", "Message"=>["FR"=>"Mot de passe incorect!", "EN"=>"Incorect password!"]];   
            } else {
                session_start();
                $_SESSION['sessionadmin'] = $ss;
                return ["Code"=>"200", "Message"=>["FR"=>"Connexion réussie!", "EN"=>"C"]];
            }
        } else {
            return ["Code"=>"180", "Message"=>["FR"=>"Numéro incorect!", "EN"=>"Incorect number!"]]; 
        }
    }

}
