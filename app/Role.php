<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = Str::slug($name);
    }
}
