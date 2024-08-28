<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_produit',
        'prix_produit',
        'produit_categorie',
        'produit_image',
        'status'
    ];
}
