<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'type_id'
    ];

    protected $primaryKey = 'id';

    public function category_device() {
        return $this->hasMany('App\Models\Device', 'category_id', 'id');
    }

    public function category_type() {
        return $this->belongsTo('App\Models\Type', 'type_id', 'id');
    }
}
