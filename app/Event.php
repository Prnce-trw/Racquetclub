<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'tb_event';
	protected $primaryKey = 'eve_id';
}
