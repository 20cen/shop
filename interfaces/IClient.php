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
interface IClient {
public function addClient(ClientBean $cb):array;
public function isExist(ClientBean $cb):bool;
public function editClient(ClientBean $cb):array;
public function allClient():array;
public function getClientById(ClientBean $cb):array;
public function getClientByNameOrFname(ClientBean $cb):array;
public function getClientByPhone(ClientBean $cb):array;
public function getClientByPays(ClientBean $cb):array;
public function getClientByEtat(ClientBean $cb):array;
public function activateClient(ClientBean $cb):array;
public function desactivateClient(ClientBean $cb):array;
public function changePasse(ClientBean $cb):array;
public function login(ClientBean $cb):array;
}
