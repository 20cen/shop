<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PlanningBean
 *
 * @author EXACTITUMNG
 */
class PlanningBean {
    private $id;
    private $date;
    private $destination;
    private $commandeid;
    
    function getId() {
        return $this->id;
    }

    function getDate() {
        return $this->date;
    }

    function getDestination() {
        return $this->destination;
    }

    function getCommandeid() {
        return $this->commandeid;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setDestination($destination) {
        $this->destination = $destination;
    }

    function setCommandeid($commandeid) {
        $this->commandeid = $commandeid;
    }


}
