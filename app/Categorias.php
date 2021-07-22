<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $guarded = [];

    public function produtos(){
        return $this->hasMany(Produtos::class, 'categoria_id');
    }
}
