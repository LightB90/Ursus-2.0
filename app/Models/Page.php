<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    public function parents()
    {
        return $this->belongsTo(static::class, 'parent');
    }

    public function childrens()
    {
        return $this->hasMany(static::class, 'parent');
    }

    public function subpages()
    {
        return $this->hasMany(Subpage::class, 'page_id','id')->where('status',1);
    }

}
