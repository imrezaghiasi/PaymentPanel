<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function payment_requests()
    {
        return $this->hasMany(PaymentRequest::class);
    }
}
