<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [

        'employee_code',
        'name',
        'phone',
        'email',
        'job_title',
        'department',
        'salary',
        'hire_date',
        'status',
        'image',

    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}