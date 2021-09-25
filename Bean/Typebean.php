<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Typebean
 *
 * @author EXACTITUMNG
 */
class Typebean {
    private $id;
    private $type;
    
    function getId() {
        return $this->id;
    }

    function getType() {
        return $this->type;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setType($type) {
        $this->type = $type;
    }


}
