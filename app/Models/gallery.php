<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class gallery extends Model
{
    protected $fillable = [
        'img',
        'user_add',
        'status',
        'sorting',
    ];
    
    protected $table = 'gallery';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];


}