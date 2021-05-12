<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pagehit extends Model
{
    //
    
    protected $fillable = [
        
        'url',
        'name',
    ];
    //defines table name if not laravel appends 's' to table name
    protected $table = 'pagehit';
}
