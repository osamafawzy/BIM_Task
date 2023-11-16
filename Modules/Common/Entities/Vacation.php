<?php

namespace Modules\Common\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Modules\School\Entities\School;
use Modules\Admin\Entities\Admin;
class Vacation extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'date', 'admin_id', 'school_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function school()
    {
        return $this->belongsTo(School::class);
    }




    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d h:i A');
    }

    public function scopeAvailable($query)
    {
        if (Auth::check('admin')) {
            $admin = Auth::user();
            //dd($admin);
            if ($admin->school_id ?? null) {
                // show only specific branch
                $query->where('school_id', $admin->school_id);
            }
        }
    }
    
    // protected static function newFactory()
    // {
    //     return \Modules\Common\Database\factories\VacationFactory::new();
    // }
}
