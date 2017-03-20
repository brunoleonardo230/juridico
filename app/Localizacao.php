<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
	protected $table = 'localizacao';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id','nome','uf'
    ];
}
