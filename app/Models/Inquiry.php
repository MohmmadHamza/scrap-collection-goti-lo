<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Inquiry extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'inquiries';

    protected $fillable = [
        'user_id',
        'category_id',
        'sub_category_id',
        'status',
        'zolio_status',
        'amount',
        'cgst',
        'sgst',
        'igst',
        'cgst_per',
        'sgst_per',
        'igst_per',
        'sub_total',
        'grand_total',
        'created_by',
        'updated_by',
        'barcode',
        'payment_type',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'cgst' => 'decimal:2',
        'sgst' => 'decimal:2',
        'igst' => 'decimal:2',
        'cgst_per' => 'decimal:2',
        'sgst_per' => 'decimal:2',
        'igst_per' => 'decimal:2',
        'sub_total' => 'decimal:2',
        'grand_total' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    
}
