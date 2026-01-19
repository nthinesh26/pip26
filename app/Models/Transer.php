<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transer extends Model
{
    protected $connection = 'tester';
    protected $table = 'trans';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    public $incrementing = false;
    //public $timestamps = false;
    
    protected $guarded = [];

    
}