<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class ProductQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_questions';

    protected $fillable = [
        'subcategory_id',
        'question_text',
        'question_type',
        'options',
        'status',
        'sort_order',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'options' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function scopeIsActive($query)
    {
        return $query->where('status', 'active');
    }
}
