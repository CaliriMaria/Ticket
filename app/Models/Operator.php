<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function messages()
    {
        return $this->hasMany(Chat::class);
    }

    public function category()
    {
        return $this->belongsToMany('App\Category', 'operator_has_categories', 'operator_id', 'category_id');
    }

}
