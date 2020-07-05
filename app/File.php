<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'file_member';

    protected $fillable = ['file_name','memberID'];
}
