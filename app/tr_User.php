<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tr_User extends Model
{
    //
    protected $fillable = [
        
        'role',
        'user_id',
        'created_at'
    ];
    //defines table name if not laravel appends 's' to table name
    protected $table = 'user_tr';
}
