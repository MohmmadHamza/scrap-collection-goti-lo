<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class ProductQuestionAnswer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_question_answers';

    protected $fillable = [
        'product_id',
        'question_id',
        'answer_text',
        'question_type',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function question()
    {
        return $this->belongsTo(ProductQuestion::class, 'question_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
