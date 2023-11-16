<?php

namespace Modules\Common\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'file', 'url'];
    protected $table = 'news';

    // protected static function newFactory()
    // {
    //     return \Modules\Common\Database\factories\NewsFactory::new();
    // }
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d h:i A');
    }
    public function getImageAttribute($value)
    {
        //dd($value);
        if ($value != null && $value != '') {
            //return public_path('uploads/news/'.$value);
           return asset('uploads/news/' . $value);
        }

        return $value;
    }
    public function getFileAttribute($value)
    {
        if ($value != null && $value != '') {
            return asset('uploads/news/PDFs/' . $value);
        }
        return $value;
    }
}
