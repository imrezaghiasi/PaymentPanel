<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentStatus extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['request_id','description_of_reject','status'];

    public function payment_request() {
        return $this->hasOne(PaymentRequest::class,'request_id');
    }
}
