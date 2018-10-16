<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    protected $fillable = [
      'orcamento', 'pergunta', 'resposta'
    ];
    protected $table = 'respostas';
}
