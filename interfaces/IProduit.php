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
interface IProduit {
public function addProduit(ProduitBean $pb):array;
public function isExist(ProduitBean $pb):bool;
public function editProduit(ProduitBean $pb):array;
public function allProduit():array;
public function getProduitById(ProduitBean $pb):array;
public function getProduitByLabel(ProduitBean $pb):array;
public function getProduitByMarque(ProduitBean $pb):array;
public function getProduitByType(ProduitBean $pb):array;
public function getProduitByFamille(ProduitBean $pb):array;
public function getProduitByStock(ProduitBean $pb):array;
}
