<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class InquiryValuation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'inquiry_valuation';

    protected $fillable = [
        'user_id',
        'inquiry_assigned_id',
        'schedule_date',
        'status',
        'valuation_offer',
        'amount',
        'description',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'schedule_date' => 'datetime',
        'amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function inquiryAssigned()
    {
        return $this->belongsTo(InquiryAssigned::class, 'inquiry_assigned_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
