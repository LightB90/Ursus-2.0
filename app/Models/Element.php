<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $table = 'elements';

    public function image()
    {
        return $this->hasOne(Images::class, 'element_id','id');
    }

    public function text()
    {
        return $this->hasOne(Texts::class, 'element_id','id');
    }

    public function parent()
    {
        return $this->belongsTo(Subpage::class, 'page_id','id');
    }
}
