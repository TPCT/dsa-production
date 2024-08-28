<?php

namespace App\Helpers;


use App\Settings\General;

trait HasSlug
{
    public function getRouteKey(){
        return $this->slug;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function bootHasSlug(){
        static::creating(function ($model){
            if ($model->slug)
                return;
            $model->slug = Utilities::slug($model->translate(app(General::class)->default_locale)->title);
        });
    }
}
