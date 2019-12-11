<?php

namespace App;

class Post extends \TCG\Voyager\Models\Post
{
	public function permalink()
	{
		return route('article', $this->slug);
	}
}
