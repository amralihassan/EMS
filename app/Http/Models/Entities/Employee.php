<?php

namespace App\Http\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'en_st_name',
        'en_nd_name',
        'en_rd_name',
        'en_th_name',
    ];

    public function scopeSort($query)
    {
        return $query->orderBy('en_st_name', 'asc');
    }

    public function setEnSTNameAttribute($value)
    {
        return $this->attributes['en_st_name'] = ucfirst($value);
    }
}
