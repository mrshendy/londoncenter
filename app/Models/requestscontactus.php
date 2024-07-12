<?php

namespace App\models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class requestscontactus extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'requests_contact_us';

    protected $fillable = ['name', 'phone', 'email', 'address', 'message'];
}