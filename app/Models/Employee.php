<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile_phone',
        'address',
        'gender',
    ];

    public function off_work() {
        return $this->hasMany(OffWork::class);
    }
}
