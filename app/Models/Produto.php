<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'image_path',
        'nome_produto',
        'descricao_produto',
        'preco',
        'qtd_estoque',
        'id_categoria',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria'); 
    }
}
