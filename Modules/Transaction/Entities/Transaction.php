<?php

namespace Modules\Transaction\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Client\Entities\Client;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'due_on',
        'vat',
        'is_vat_inclusive',
        'client_id',
        'status'
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }


}
