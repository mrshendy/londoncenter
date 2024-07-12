<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
class date extends Model
{

    use HasTranslations;
    protected $fillable = [
        'name',
        'status',
        'user_add',

    ];
    public $translatable = ['name'];
    protected $table = 'date';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];



}