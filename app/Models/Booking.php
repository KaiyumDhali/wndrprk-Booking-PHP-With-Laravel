<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'room_id',
        'total_days',
        'check_in_date',
        'check_out_date',
        'total_amount',
        'payment_status',
        'Booking_status',
        'booking_no',
        'table_room_number',
        'table_check_in_date',
        'table_room_number',
    ];


    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function room(){
        return $this->belongsTo(Room::class, 'room_id');
    }


}
