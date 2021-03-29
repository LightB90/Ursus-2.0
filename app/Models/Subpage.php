<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subpage extends Model
{
    use HasFactory;

    protected $table = 'subpages';

    public function parent()
    {
        return $this->belongsTo(Page::class, 'page_id','id');
    }

    public function elements()
    {
        return $this->hasMany(Element::class, 'page_id','id')->where('status',1);
    }

}
