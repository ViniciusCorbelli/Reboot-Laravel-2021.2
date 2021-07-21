<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $guarded = [];

    public function categoria(){
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }
    
    public function users(){
        return $this->belongsToMany(User::class, 'produtos_user', 'produto_id', 'user_id');
    }
}
