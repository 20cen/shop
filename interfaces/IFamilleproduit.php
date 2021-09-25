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
interface IFamilleproduit {
public function addFamille(FamilleBean $fb):array;
public function isExist(FamilleBean $fb):bool;
public function editFamille(FamilleBean $fb):array;
public function allFamille():array;
public function getFamilleById(FamilleBean $fb):array;
public function getFamilleByLabel(FamilleBean $fb):array;
}
