<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	protected $table = 'member';
	protected $primaryKey = 'memberID';

	public function gender()
	{
		if ($this->gender == 1) {
			return 'ชาย';
		} else {
			return 'หญิง';
		}
	}
}
