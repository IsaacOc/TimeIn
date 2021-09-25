<?php

namespace App\Repositories;

Interface PostRepositoryInterface{

public function getAllUser();
public function getAllLogs();
public function getAllPagehits();

public function getUserById($id);
public function getLogsById($id);

public function getAuthUserByEmail($id);
public function getAuthUserByEmailAndRole($id);
public function getAuthUserLogByEmailAndRole($id);

public function addTimeIn($Logs);
public function addUser($User);

public function UpdateUser($User);
public function updateTimOut($User);

public function sendNotification();
public function saveLinks();

public function timeRegister($email,$date);
}
