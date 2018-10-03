<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = [
      'servico', 'preco', 'estados'
    ];
    protected $table = "servicos";
}
