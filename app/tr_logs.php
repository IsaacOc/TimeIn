<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tr_logs extends Model
{
    //
    protected $fillable = [
        
        'id',
        'role',
        'email',
        'date_in',
        'time_in',
        'time_out',

    ];
    //defines table name if not laravel appends 's' to table name
    protected $table = 'Logs_tr';
}
