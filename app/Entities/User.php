<?php namespace App\Entities;

use CodeIgniter\Shield\Entities\User as ShieldUser;

class User extends ShieldUser
{
    protected $casts = [
        'id'         => 'integer',
        'phone'      => 'string',
        'last_active'=> 'datetime',
    ];
}
