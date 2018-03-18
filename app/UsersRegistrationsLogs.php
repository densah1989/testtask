<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersRegistrationsLogs extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'registered_at'
    ];

    public $timestamps  = false;
}
