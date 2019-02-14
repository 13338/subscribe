<?php

namespace App;

use Illuminate\Support\Str;

trait Uuids
{

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
            $model->file = Str::uuid()->toString();
        });

        parent::boot();
    }
}
