<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class sections extends Model
{
    use HasTranslations;
    protected $fillable = [
        'name',
        'img',
        'user_add',
        'status',
        'sorting',
    ];
    public $translatable = ['name'];
    protected $table = 'sections';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function courses()
    {
        return $this->hasMany(courses::class, 'id_sections');
    }

}