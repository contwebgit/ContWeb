<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perguntas extends Model
{
    protected $fillable = [
      'pergunta', 'respostas'
    ];
}
