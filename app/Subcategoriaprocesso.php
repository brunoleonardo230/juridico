<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoriaprocesso extends Model
{
	protected $table = 'subcategoriaprocesso';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id','nome','idcategoriaprocesso'
    ];
}
