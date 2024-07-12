<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class generalsetting extends Model
{
    use HasTranslations;
    protected $table = 'general_settings';
    protected $guarded = [];
    public $timestamps = true;
    public $translatable = ['objectives','mission','vision','address','about'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}