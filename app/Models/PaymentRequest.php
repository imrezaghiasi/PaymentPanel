<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentRequest extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =  ['user_id','category_id', 'description', 'amount', 'file_path', 'shaba_number', 'national_code'];

    public function payment_category()
    {
        return $this->belongsTo(PaymentCategory::class);
    }

    public function payment_status() {
        return $this->belongsTo(PaymentRequest::class);
    }
}
