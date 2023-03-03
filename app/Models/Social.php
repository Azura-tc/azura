<?php

namespace App\Models;

use App\Models\User;
use App\Traits\UserCreatedTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Social extends Model
{
    use HasFactory, SoftDeletes, UserCreatedTrait;

    protected $fillable = [
        'name',
        'icon',
        'url',
    ];

    public function icon() : Attribute
    {
        return Attribute::get(fn($value) => (!is_null($value) && Storage::disk('public')->exists($value)) ? Storage::url($value) : $value);
    }

    public function createdBy():BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy():BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy():BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
