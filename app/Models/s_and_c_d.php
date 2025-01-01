<?php
namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class s_and_c_d extends Model
{    
    use HasTranslations;
    use HasFactory;
    protected $fillable = ['date', 'duration', 'place_id', 's_and_c_id'];
    public $translatable = ['duration'];
    use SoftDeletes;
    protected $table = 's_and_c_d';

    public function place()
    {
        return $this->belongsTo(place::class, 'place_id');
    }
    public function s_and_c()
    {
        return $this->belongsTo(Course::class, 's_and_c_id');
    }
}