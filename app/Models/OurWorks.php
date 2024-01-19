<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurWorks extends Model
{
    protected $fillable = ['name', 'cover', 'description', 'year', 'what_we_do'];

    use HasFactory;
}
