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
interface IPlanning {
public function addPlanning(PlanningBean $plb):array;
public function isExist(PlanningBean $plb):bool;
public function editPlanning(PlanningBean $plb):array;
public function allPlanning():array;
public function getPlanningById(PlanningBean $plb):array;
public function getPlanningByDate(PlanningBean $plb):array;
public function getPlanningByDestination(PlanningBean $plb):array;
public function getPlanningByCommande(PlanningBean $plb):array;
}
