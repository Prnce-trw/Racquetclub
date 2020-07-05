<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';

protected $fillable = ['package_name','package_price','	package_numday','memberID','less','more','astext'];
}
