<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class InquiryQuestionAnswer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'inquiry_question_answers';

    protected $fillable = [
        'inquiry_id',
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

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class, 'inquiry_id');
    }

    public function question()
    {
        return $this->belongsTo(InquiryQuestion::class, 'question_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
