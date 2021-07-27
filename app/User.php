<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    public function produtos()
    {
        return $this->belongsToMany(User::class, 'produtos_user',  'user_id', 'produto_id')->withPivot('nota');
    }
}
