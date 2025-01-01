<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class s_and_c extends Model
{
    use HasTranslations;
    protected $fillable = [
        'name',
        'introduction',
        'content',
        'img',
        'user_add',
        'status',
        'sorting',
        'file',
    ];
    public $translatable = ['name','content','introduction'];
    protected $table = 's_and_c';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
 
}