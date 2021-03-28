<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = ['name','page_id','status','path','thumb_path'];

    public function parent()
    {
        return $this->belongsTo(Element::class, 'element_id','id');
    }
}
