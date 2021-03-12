<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'ADMIN_PROFILE';    
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    protected $hidden = ['password'];
    public $incrementing = false;
    public $timestamps = false;
}
