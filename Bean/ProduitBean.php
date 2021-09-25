<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProduitBean
 *
 * @author EXACTITUMNG
 */
class ProduitBean {
    private $id;
    private $label;
    private $prix;
    private $detail;
    private $stock;
    private $image;
    private $mproduitid;
    private $tproduitid;
    private $fproduitid;
    
    function getId() {
        return $this->id;
    }

    function getLabel() {
        return $this->label;
    }

    function getPrix() {
        return $this->prix;
    }

    function getDetail() {
        return $this->detail;
    }

    function getStock() {
        return $this->stock;
    }

    function getImage() {
        return $this->image;
    }

    function getMproduitid() {
        return $this->mproduitid;
    }

    function getTproduitid() {
        return $this->tproduitid;
    }

    function getFproduitid() {
        return $this->fproduitid;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLabel($label) {
        $this->label = $label;
    }

    function setPrix($prix) {
        $this->prix = $prix;
    }

    function setDetail($detail) {
        $this->detail = $detail;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setMproduitid($mproduitid) {
        $this->mproduitid = $mproduitid;
    }

    function setTproduitid($tproduitid) {
        $this->tproduitid = $tproduitid;
    }

    function setFproduitid($fproduitid) {
        $this->fproduitid = $fproduitid;
    }


}
