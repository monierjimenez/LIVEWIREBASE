<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    public function getRouteKeyName()
//    {
//        return 'url';
//    }

//    public function setNameAttribute($name)
//    {
//        $this->attributes['name'] = $name;
//        $this->attributes['url'] = Str::slug($name);
//    }
}
