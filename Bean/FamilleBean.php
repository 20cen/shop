<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FamilleBean
 *
 * @author EXACTITUMNG
 */
class FamilleBean {
    private $id;
    private $famille;
    
    function getId() {
        return $this->id;
    }

    function getFamille() {
        return $this->famille;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFamille($famille) {
        $this->famille = $famille;
    }


}
