<?php
namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class courses_details extends Model
{    
    use HasTranslations;
    use HasFactory;
    protected $fillable = ['date', 'duration', 'place_id', 'course_id'];
    public $translatable = ['duration'];
    use SoftDeletes;
    public function place()
    {
        return $this->belongsTo(place::class, 'place_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}