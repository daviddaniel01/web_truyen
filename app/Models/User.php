<?php

namespace App\Models;

use App\Enums\UserLevelEnum;
use App\Enums\UserStatusEnum;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'status',
        'birthday',
        'level',
    ];

    protected $hidden = [
        'password',
        'remember_token',
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
