<?php

namespace Modules\Common\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;

class TeacherLevels extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['title','for'];
    protected $table = 'teacher_levels';

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d h:i A');
    }
    // protected static function newFactory()
    // {
    //     return \Modules\Common\Database\factories\TeacherLevelsFactory::new();
    // }
}
