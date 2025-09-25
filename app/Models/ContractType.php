<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
{
    protected $fillable = ['name'];

    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }
}