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
interface ICommande {
public function addCommande(CommandeBean $cb):array;
public function isExist(CommandeBean $cb): bool;
public function editCommande(CommandeBean $cb):array;
public function allCommande():array;
public function getCommandeById(CommandeBean $cb):array;
public function getCommandeByPaye(CommandeBean $cb):array;
public function getCommandeByDate(CommandeBean $cb):array;
public function getCommandeByChauffeur(CommandeBean $cb):array;
public function getCommandeByProduit(CommandeBean $cb):array;
public function getCommandeByClient(CommandeBean $cb):array;
}
