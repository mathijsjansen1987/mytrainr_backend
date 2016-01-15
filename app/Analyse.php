<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Analyse extends Authenticatable
{
	   protected $table = 'analysis';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'date','type',
    ];


}
