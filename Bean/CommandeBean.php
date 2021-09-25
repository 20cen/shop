<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommandeBean
 *
 * @author EXACTITUMNG
 */
class CommandeBean {
    private $id;
    private $paye;
    private $date;
    private $chauffeur;
    private $produitid;
    private $quantite;
    private $clientid;
    
    function getId() {
        return $this->id;
    }

    function getPaye() {
        return $this->paye;
    }

    function getDate() {
        return $this->date;
    }

    function getChauffeur() {
        return $this->chauffeur;
    }

    function getProduitid() {
        return $this->produitid;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function getClientid() {
        return $this->clientid;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPaye($paye) {
        $this->paye = $paye;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setChauffeur($chauffeur) {
        $this->chauffeur = $chauffeur;
    }

    function setProduitid($produitid) {
        $this->produitid = $produitid;
    }

    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    function setClientid($clientid) {
        $this->clientid = $clientid;
    }


}
