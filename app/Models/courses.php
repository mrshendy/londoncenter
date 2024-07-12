<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class courses extends Model
{
    use HasTranslations;
    protected $fillable = [
        'name',
        'id_sections',
        'id_place',
        'date',
        'introduction',
        'duration',
        'course_content',
        'price',
        'img',
        'user_add',
        'status',
        'sorting',
        'file',
    ];
    public $translatable = ['name','course_content','introduction'];
    protected $table = 'courses';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
   public function sections()
    {
        return $this->belongsTo(sections::class, 'id_sections');
    }
   
}