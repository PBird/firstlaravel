<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nav extends Model
{
    protected $fillable= ['title' , 'name','content','imagepath'];
}
