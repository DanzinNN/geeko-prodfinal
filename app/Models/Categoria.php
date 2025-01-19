<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_categoria',
        'descricao',
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'id_categoria'); 
    }
}
