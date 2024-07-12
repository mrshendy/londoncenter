<?php

namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class requestsjoin extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'requests_join';

    protected $fillable = ['name', 'phone', 'email', 'notes', 'id_courses_details'];
}