<?php
// File: app/Models/Admin.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
   /*  use Notifiable;

    protected $table = 'admins'; // Define the table name
    protected $guard = 'admin'; // Define the guard name

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'other_name',
        'photo_profile'
    ];

    protected $hidden = ['password'];

    
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    } */
   use Notifiable;
    
    protected $table = 'admins'; // Define the table name
    protected $guard = 'admin';           // important

    protected $fillable = [
        'username', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
