<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $primaryKey = 'checkout_id';
    protected $table = 'report_checkout';
    protected $fillable = [
        'name',
        'email',
        'job_title',
        'company',
        'country',
        'contact',
        'billing_address',
        'report_id',
        'order_number',
        'order_date',
        'payment_status',
        'payment_gateway',
        'amount',
        'licence_type',
        'payment_mode',
        'transaction_id',
            ];
    protected $hidden = [
        '_token',
    ];
}