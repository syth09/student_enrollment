<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email', 'major'];

    // Quan hệ nhiều-nhiều với Course thông qua bảng enrollments (Many-to-Many)
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')
            ->withPivot('id')
            ->withTimestamps();
    }

    // Tính tổng tín chỉ đã đăng ký
    public function getTotalCreditsAttribute()
    {
        return $this->courses->sum('credits');
    }
}
