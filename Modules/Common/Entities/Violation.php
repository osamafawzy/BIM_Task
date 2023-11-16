<?php

namespace Modules\Common\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Violation extends Model
{
    use HasFactory;

    protected $fillable = ['title','violation_id'];


    public function childs(){
        return $this->hasMany(Violation::class);
    }

}
