<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    protected $fillaboe = [
        'item_carrinho',
        'qtd_itens',
        'total_carrinho',
        'status_carrinho',
    ];
}
