<?php

namespace App\Repositories;

use Illuminate\Support\str;
use App\User;
use App\logs;
use App\pagehit;

use App\Events\Links;
use App\Events\TimeIn;

class PostRepository implements PostRepositoryInterface
{
    public function saveLinks(){
        event(new Links());
    }
    
    public function sendNotification(){
        event(new TimeIn());
    }
    
    public function getAllUser(){
        return User::all();
    }

    public function getAllLogs(){
        return logs::all();
    }

    public function getAllPagehits(){
        return pagehit::all();
    }

    public function getUserById($id){
        return User::findorfail($id);
    }
    
    public function getLogsById($id){
        return logs::findorfail($id);
    }

    public function addTimeIn($Log){
   
        $Logs = Logs::create([               
                    'role' => $Log['role'],
                    'email' => $Log['email'],
                    'time_in' => $Log['time_in'], 
                    'date_in' => $Log['date_in'],             
                ]);
    
        return $Logs;

    }

    public function addUser($User){
   
        $Users = User::create([      
                    'name' => $User['name'],
                    'email' => $User['email'],
                    'password' => bcrypt($User['password']), 
                    'role' => $User['role'],
                    'admin' => $User['admin'],
                    'api_token' => str::random(60)  
                ]);
    
        return $Users;

    }

    public function UpdateUser($User){

        $Users = User::where('id',$User['id'])->update([           
                    'name' => $User['name'],
                    'email' => $User['email'],
                    'password' => bcrypt($User['password']), 
                    'role' => $User['role'], 
                ]);

        return $Users;
    }

    public function updateTimOut($User){

        $Logs = Logs::where('id',$User['id'])->update([            
                    'time_out' => $User['time_out'],
                ]);
        
        return $Logs;
    }

    public function getAuthUserByEmail($User){

        $userDB = User::select("*")
        ->where('admin', $User['email'])->get();

        return $userDB;
    }
    public function getAuthUserByEmailAndRole($User){

        $userDB = User::select("*")
        ->where([
                    ["role", $User['role'],
                    ["email", $User['email']]
                ]
                 ])->get();

        return $userDB;
    }

    public function getAuthUserLogByEmailAndRole($User){

        $userDB = Logs::select("*")
        ->where([
                    ["role", $User['role'],
                    ["email", $User['email']]
                ]
                 ])->get();

        return $userDB;
    }

    public function timeRegister($email,$date){

        $userDB = Logs::select("*")
        ->where([
                    ["date_in", $date,
                    ["email", $email]
                ]
                 ])->get();

        return $userDB;
    }
}
