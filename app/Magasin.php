<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magasin extends Model
{
    protected $fillable = ['nom', 'ville', 'note'];
}
