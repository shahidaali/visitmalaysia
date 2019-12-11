<?php
function laravelbuilder_assets($path = "") {
	return asset('laravelbuilder/' . $path);
}

function laravelbuilder_scripts() {
	$scripts = config('laravelbuilder.scripts');

	$output = "";

	$js_config = json_encode([
		'snippet_url' => route('laravelbuilder.snippets')
	]);
	$output .= '<script>
		var laravelbuilder_config = '. $js_config .';
	</script>';
	if(!empty($scripts)) {
		foreach ($scripts as $key => $src) {
			$output .= '<script type="text/javascript" data-keditor="script" src="'.asset($src).'"></script>';
		}
	}
	return $output;
}

function laravelbuilder_styles() {
	$styles = config('laravelbuilder.styles');

	$output = "";
	if(!empty($styles)) {
		foreach ($styles as $key => $src) {
			$output .= '<link rel="stylesheet" type="text/css" href="'.asset($src).'" data-type="keditor-style" />';
		}
	}
	return $output;
}

function laravelbuilder_default_preview($image) {
	return asset('laravelbuilder/keditor/snippets/preview/' . $image);
}

function laravelbuilder_default_image($image) {
	return asset('laravelbuilder/keditor/snippets/img/' . $image);
}

