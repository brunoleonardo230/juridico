<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoriaprocesso extends Model
{
	protected $table = 'categoriaprocesso';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id','nome'
    ];
}
