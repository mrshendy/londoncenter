<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
class place extends Model
{
    use HasTranslations;
    protected $fillable = ['name', 'status', 'user_add'];
    public $translatable = ['name'];
    protected $table = 'place';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}