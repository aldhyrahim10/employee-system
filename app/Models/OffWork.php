<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OffWork extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'reason',
    ];    

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}
