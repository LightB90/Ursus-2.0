<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subpage extends Model
{
    use HasFactory;

    protected $table = 'subpages';
    protected $casts = ['images'=>'array','buttons'=>'array'];
    protected $fillable = ['page_data'];

}
