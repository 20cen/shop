<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author EXACTITUMNG
 */
interface IMarqueproduit {
public function addMarque(MarqueBean $mb):array;
public function isExist(MarqueBean $mb):bool;
public function editMarque(MarqueBean $mb):array;
public function allMarque():array;
public function getMarqueById(MarqueBean $mb):array;
public function getMarqueByLabel(MarqueBean $mb):array;
}
