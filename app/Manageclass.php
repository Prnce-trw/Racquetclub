<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manageclass extends Model
{
    protected $table = 'manageclass';

protected $fillable = ['classID','class_title','hour','price','price_hour','Status'];
}
