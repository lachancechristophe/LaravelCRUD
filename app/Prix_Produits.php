<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prix_Produits extends Model
{
    public $table = 'prix_produits';
    protected $fillable = ['id_produit', 'format', 'prix_unite', 'id_magasin'];
}
