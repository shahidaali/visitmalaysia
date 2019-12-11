<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    function filterArticles() {
    	$data = App\Articles::with('categories')->get();
    }
}
