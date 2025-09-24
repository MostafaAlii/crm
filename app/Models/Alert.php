<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;
    protected $table = "type";
    protected $fillable = ['type', 'alertable_type', 'alertable_id', 'message', 'expires_at', 'read_at', 'meta'];
    protected $casts = ['meta' => 'array', 'expires_at' => 'datetime', 'read_at' => 'datetime'];
    public function alertable()
    {
        return $this->morphTo();
    }
}