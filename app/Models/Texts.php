<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texts extends Model
{
    use HasFactory;

    protected $table = 'texts';
    protected $fillable = ['data','position','status','page_id'];

    public function parent()
    {
        return $this->belongsTo(Element::class, 'element_id','id');
    }

}
