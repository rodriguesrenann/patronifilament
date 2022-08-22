<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'texto',
        'cor_texto',
        'texto_botao',
        'link_botao',
        'cor_fundo_botao',
        'imagem_fundo',
        'status',
        'ordem',
    ];
}
