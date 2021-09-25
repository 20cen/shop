<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connexion
 *
 * @author brejnevngondi
 */
namespace Bouticdata;
use PDO;
class Connexion {
    //put your code here
    private $host ='127.0.0.1';
    private $user ='root';
    private $pass='';
    private $dbname='boutique';
    private $port;
    private $pdo;
    
    function getHost() {
        return $this->host;
    }

    function getUser() {
        return $this->user;
    }

    function getPass() {
        return $this->pass;
    }

    function getDbname() {
        return $this->dbname;
    }

    function getPort() {
        return $this->port;
    }

    function setHost($host) {
        $this->host = $host;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setDbname($dbname) {
        $this->dbname = $dbname;
    }

    function setPort($port) {
        $this->port = $port;
    }
    

        public function connecter():PDO{
        if($this->pdo===null){
        $conn = new PDO("mysql:host=".$this->getHost().";dbname=".$this->getDbname()."",''.$this->getUser().'',''.$this->getPass().'');
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
        $this->pdo = $conn;
        }
        return $this->pdo;
    }
    
    public function getAnnee(){
        return $this->anneeac;
    }
}


