<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $table = 'tb_booking';
    protected $primaryKey = 'booking_id';
    // public $timestamps = false;

    public function playingtype()
    {
        if ($this->booking_type == 1) {
            return '<span>P</span>'; 
        } else {
            return '<span>C</span>'; 
        }
        
    }

    public function changeDatatoTime()
    {
        if ($this->booking_time == 0) {
            return '6:00'; 
        } elseif ($this->booking_time == 1) {
            return '7:00'; 
        } elseif ($this->booking_time == 2) {
            return '8:00'; 
        } elseif ($this->booking_time == 3) {
            return '9:00'; 
        } elseif ($this->booking_time == 4) {
            return '10:00'; 
        } elseif ($this->booking_time == 5) {
            return '11:00'; 
        } elseif ($this->booking_time == 6) {
            return '12:00'; 
        } elseif ($this->booking_time == 7) {
            return '13:00'; 
        } elseif ($this->booking_time == 8) {
            return '14:00'; 
        } elseif ($this->booking_time == 9) {
            return '15:00'; 
        } elseif ($this->booking_time == 10) {
            return '16:00'; 
        } elseif ($this->booking_time == 11) {
            return '17:00'; 
        } elseif ($this->booking_time == 12) {
            return '18:00'; 
        } elseif ($this->booking_time == 13) {
            return '19:00'; 
        } elseif ($this->booking_time == 14) {
            return '20:00'; 
        } elseif ($this->booking_time == 15) {
            return '21:00'; 
        } elseif ($this->booking_time == 16) {
            return '22:00'; 
        }
    }
}
