<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MarqueBean
 *
 * @author EXACTITUMNG
 */
class MarqueBean {
    private  $id;
    private $marque;
    
    function getId() {
        return $this->id;
    }

    function getMarque() {
        return $this->marque;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMarque($marque) {
        $this->marque = $marque;
    }


}
