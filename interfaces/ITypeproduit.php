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
interface ITypeproduit {
public function addType(Typebean $tb):array;
public function isExist(Typebean $tb):bool;
public function editType(Typebean $tb):array;
public function allType():array;
public function getTypeById(Typebean $tb):array;
public function getTYpeByLabel(Typebean $tb):array;
}
