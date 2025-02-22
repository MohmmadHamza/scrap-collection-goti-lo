<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Models\BaseModel;

class Brand extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'brands';

    protected $fillable = [
        'name',
        'code',
        'description',
        'image_url',
        'status',
        'sort_order',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected function getLogAttributes(): array
    {
        return ['name', 'code', 'description', 'image_url', 'status', 'sort_order', 'created_by', 'updated_by', 'deleted_by'];
    }

    public function scopeIsActive($query)
    {
        return $query->where('status', 'active');
    }

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function updatedBy()
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
