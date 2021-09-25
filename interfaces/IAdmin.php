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
interface IAdmin {
public function addAdmin(AdminBean $ab):array;
public function isExist(AdminBean $ab):bool;
public function editAdmin(AdminBean $ab):array;
public function allAdmin():array;
public function getAdminById(AdminBean $ab):array;
public function getAdminByNameOrFname(AdminBean $ab):array;
public function getAdminByTel(AdminBean $ab):array;
public function changePass(AdminBean $ab):array;
public function changeTel(AdminBean $ab):array;
public function login(AdminBean $ab):array;
}
