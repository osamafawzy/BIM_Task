<?php

namespace Modules\Client\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Order\Entities\History;
use Modules\Order\Entities\Order;
use Spatie\Activitylog\Traits\LogsActivity;

class Client extends Authenticatable implements JWTSubject
{
    use HasFactory,Notifiable,LogsActivity;

    protected $fillable = ['name','email','password','image'];
    protected $hidden =['password'];
    protected static $logName  = 'Client';
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['updated_at'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;


    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d h:i A');
    }


    public function getImageAttribute($value)
    {
        if ($value != null && $value != '') {
            return asset('uploads/Client/' . $value);
        }
        return $value;
    }


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
