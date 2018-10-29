<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThemeOptions extends Model
{
    protected $fillable = [
      'opt_key', 'opt_value'
    ];
    protected $table = 'theme_options';
}
