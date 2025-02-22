<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class InquiryFollowUp extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'inquiry_follow_up';

    protected $fillable = [
        'inquiry_id',
        'inquiry_assigned_id',
        'status',
        'comment',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class, 'inquiry_id');
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
