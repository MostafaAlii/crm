<?php
namespace App\Models;
use App\Enums\MainSetting\{MainSettingSystemStatus};
use App\Models\Concerns\UploadMedia;
class AdminPanelSetting extends BaseModel {
    use UploadMedia;
    protected $table = 'admin_panel_settings';
    protected $fillable = [
        'uuid',
        'system_status',
        'company_name',
        'phone',
        'address',
        'email',
    ];

    protected $casts = [
        'system_status' => MainSettingSystemStatus::class,
    ];

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}