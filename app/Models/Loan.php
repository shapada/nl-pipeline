<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Loan extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'loans';

    protected $dates = [
        'closing_date',
        'interest_rate_expiration',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'loan_number',
        'product_id',
        'customer',
        'lender',
        'processor',
        'loan_amount',
        'contract_price',
        'closing_date',
        'closing_time',
        'closing_location',
        'closing_confirmed',
        'title_company',
        'interest_rate',
        'interest_rate_locked',
        'interest_rate_expiration',
        'approval_required',
        'approval_documents_signed',
        'flood_ordered',
        'title_ordered',
        'appraisal_ordered',
        'address',
        'contact_info',
        'notes',
        'escrow',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getClosingDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setClosingDateAttribute($value)
    {
        $this->attributes['closing_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getInterestRateExpirationAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInterestRateExpirationAttribute($value)
    {
        $this->attributes['interest_rate_expiration'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
