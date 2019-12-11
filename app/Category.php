<?php

namespace App;

class Category extends \TCG\Voyager\Models\Category
{
	public function posts()
    {
        return $this->hasMany('App\Post')
            ->published()
            ->orderBy('created_at', 'DESC');
    }
}
