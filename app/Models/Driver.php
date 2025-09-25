<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Concerns\UploadMedia;
class Driver extends BaseModel {
    use SoftDeletes, UploadMedia;
    protected $table = 'drivers';
    protected $fillable = [
        'uuid',
        'name',
        'identity_number',
        'license_number',
        'license_expires_at',
        'phone',
        'salary',
        'fixed_allowance',
        'bonus_balance',
        'attachments',
        'nationality_id',
        'contract_type_id',
        'department_id',
        'second_phone',
        'email',
        'residence_number',
        'hire_date',
    ];


    protected $casts = [
        'license_expires_at' => 'date',
    ];

    public function transportOrders()
    {
        return $this->hasMany(TransportOrder::class);
    }
    public function waybills()
    {
        return $this->hasMany(Waybill::class);
    }
    public function incentives()
    {
        return $this->hasMany(DriverIncentive::class);
    }
    public function fuelLogs()
    {
        return $this->hasMany(FuelLog::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function contractType()
    {
        return $this->belongsTo(ContractType::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
