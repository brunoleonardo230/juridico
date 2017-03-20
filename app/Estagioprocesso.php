<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estagioprocesso extends Model
{
	protected $table = 'estagioprocesso';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id','nome'
    ];
}
