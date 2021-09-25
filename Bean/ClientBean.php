<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientBean
 *
 * @author EXACTITUMNG
 */
class ClientBean {
    private $id;
    private $nom;
    private $prenom;
    private $sexe;
    private $tel;
    private $email;
    private $adresse;
    private $pays;
    public $pass;
    private $etat;
    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getSexe() {
        return $this->sexe;
    }

    function getTel() {
        return $this->tel;
    }

    function getEmail() {
        return $this->email;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getPays() {
        return $this->pays;
    }

    function getPass() {
        return $this->pass;
    }

    function getEtat() {
        return $this->etat;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setSexe($sexe) {
        $this->sexe = $sexe;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setPays($pays) {
        $this->pays = $pays;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }


}
