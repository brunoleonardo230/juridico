<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
	protected $table = 'estados';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id','sicla','descricao'
    ];
}
