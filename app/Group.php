<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Group extends Authenticatable
{
	   protected $table = 'groups';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'sport_id'
    ];


}
