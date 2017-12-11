<?php

namespace Checklist\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    public function items()
    {
        return $this->belongsToMany('Checklist\Models\Item')
                    ->withPivot('created_by')
                    ->withTimestamps();
    }
}