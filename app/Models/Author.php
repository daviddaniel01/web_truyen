<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alias',
        'gender',
        'birthday',
    ];


    public function getGenderNameAttribute(): string
    {
        return ($this->attributes['gender'] === 0) ? 'Nam' : 'Nữ';
    }

    public function getAgeAttribute(): int
    {
        return date_diff(date_create($this->attributes['birthday']), date_create('now'))->y;
    }
}
