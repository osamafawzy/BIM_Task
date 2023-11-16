<?php

namespace Modules\Common\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Entities\Absence;
use Modules\Employee\Entities\Holiday;

class HolidayType extends Model
{
    use HasFactory;

    protected $fillable = ["title", "days_number"];
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d h:i A');
    }

    public function absences(){
        return $this->hasMany(Absence::class,'holiday_type_id');
    }

    public function holidays(){
        return $this->hasMany(Holiday::class,'holiday_type_id');
    }
}
