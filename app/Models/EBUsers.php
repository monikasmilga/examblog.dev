<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class EBUsers extends Authenticatable
{
    use Notifiable;

    protected $table = 'eb_users';

    protected $fillable = ['id', 'name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    public $incrementing = false;

    use SoftDeletes;
}
