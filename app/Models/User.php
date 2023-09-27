<?php

namespace App\Models;

use App\Enums\UserLevelEnum;
use App\Enums\UserStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model 
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'birthday',
        'status',
        'level',
    ];


    public function getGenderNameAttribute(): string
    {
        return ($this->attributes['gender'] === 0) ? 'Nam' : 'Nữ';
    }

    public function getAgeAttribute(): int
    {
        return date_diff(date_create($this->attributes['birthday']), date_create('now'))->y;
    }


    public function getStatusAttribute(): string
    {
        return UserStatusEnum::getKeyByValue($this->attributes['status']);
    }


    public function getLevelAttribute(): string
    {
        return UserLevelEnum::getKeyByValue($this->attributes['level']);
    }
}
