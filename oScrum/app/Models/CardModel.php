<?php

namespace App\Models;

// Equivalent du "CoreModel"
// et permet de récupérer les méthodes du CRUD
use Illuminate\Database\Eloquent\Model;

class CardModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'card';

    // On n'a pas les colonnes created_at & updated_at
    // Donc on le dit à Eloquent
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

}