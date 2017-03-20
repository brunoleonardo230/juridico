<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoriatribunal extends Model
{
	protected $table = 'categoriatribunal';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id','nome'
    ];
}
