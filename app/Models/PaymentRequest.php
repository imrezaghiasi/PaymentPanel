<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'category_id', 'request_description', 'reject_description', 'status', 'amount', 'file_path', 'shaba_number', 'national_code'];

    protected $appends = ['status_title', 'shaba_identifier'];

    public function payment_category()
    {
        return $this->belongsTo(PaymentCategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusTitleAttribute()
    {
        if ($this->status == 2)
            return 'در حال بررسی';
        elseif ($this->status == 0)
            return 'رد شد';
        else
            return 'تایید شد';
    }

    public function getShabaIdentifierAttribute()
    {
        $shaba_identifier = $this->shaba_number;
        return substr($shaba_identifier, 0, 2);
    }
}
