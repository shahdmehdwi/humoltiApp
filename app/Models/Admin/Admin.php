<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable=[
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
