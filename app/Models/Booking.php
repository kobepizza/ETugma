<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table ='bookings';

    protected $fillable = ['guardian_main_id','tutor_main_id','rates_id','booking_status_id','day_availability_session_type_id','session_start_date'];

    public function guardianMain(){
        return $this->belongsTo(GuardianMain::class,'guardian_main_id');
    }

    public function tutorMain(){
        return $this->belongsTo(TutorMain::class,'tutor_main_id');
    }

    public function rate(){
        return $this->belongsTo(Rates::class,'rates_id');
    }

    public function bookingStatus(){
        return $this->belongsTo(BookingStatus::class,'booking_status_id');
    }

    public function transaction(){
        return $this->hasMany(Transaction::class,'booking_id');
    }

    public function notification(){
        return $this->hasMany(Notification::class);
    }

    public function bookingAvailability(){
        return $this->belongsTo(BookingAvailability::class,'booking_availability_id');
    }

        public function apiInvoiceRequest()
    {
        return $this->belongsTo(ApiInvoiceRequest::class, 'api_invoice_request_id');
    }

}
