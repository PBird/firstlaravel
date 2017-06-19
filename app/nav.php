<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nav extends Model
{
    protected $fillable= ['name'];






    protected function post()
    {

    	return $this->hasOne('App\post');

    }





}
