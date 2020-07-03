<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{
    protected $fillable =['name','age','gender','height','weight','dad','mom','address'];

    public $timestamps = true;
}
