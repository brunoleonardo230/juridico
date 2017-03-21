<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tribunal extends Model
{
	protected $table = 'tribunal';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id','nome','idlocalizacao','idtribunalcategoria','descricao'
    ];
}
