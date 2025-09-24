<?php
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class City extends BaseModel {
    use SoftDeletes;
    protected $table = 'cities';
    protected $fillable = [
        'uuid',
        'name',
        'governorate',
    ];
}