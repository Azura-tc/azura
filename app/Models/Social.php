<?php

namespace App\Models;

use App\Traits\UserCreatedTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Social extends Model
{
    use HasFactory, SoftDeletes, UserCreatedTrait;

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
