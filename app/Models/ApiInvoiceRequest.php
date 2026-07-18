<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiInvoiceRequest extends Model
{
    use HasFactory;
    protected $table = 'api_invoice_request';

        public function booking()
    {
        return $this->hasMany(Booking::class, 'api_invoice_request_id');
    }
}
