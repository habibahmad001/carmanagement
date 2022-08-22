<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CreateLocationTable extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $table = 'locationtable';

    protected $fillable = [
        'id','location_title'
    ];

}
