<?php 
namespace App\Shortcodes;

class CategoryGridShortcode {

  public function register($shortcode, $content, $compiler, $name, $viewData)
  {
  	$categories = $shortcode->categories;
  	__pre($categories);
    return sprintf('<strong class="%s">%s</strong>', $shortcode->class, $content);
  }
  
}