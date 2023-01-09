<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Advert extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'from', 'to', 'total_budget', 'daily_budget', 'image'];
    protected $table = 'advert';
    public $timestamps = false;
}