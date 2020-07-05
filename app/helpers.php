<?php
use App\Daypass;

if (!function_exists('memberDaypass')) {
    function memberDaypass($id_card)
    {
        $daypass = Daypass::whereDate('created_at',date('Y-m-d'))
        ->where('card_id',$id_card)
        ->where('return_card','=','0')
        ->orderBy('created_at','desc')
        ->first();
        return $daypass;
    }
}

?>
