<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Notifications\clockingIn;

class User extends Authenticatable
{
    use Notifiable;

    //sends nontification clockingIn
    public function sendsNotificationsclockingIn()
    {
       
    return $this->notify(new clockingIn());
    
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','admin','api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
