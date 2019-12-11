<?php
function __pre($code) {
	echo '<pre>';
	print_r($code);
	echo '</pre>';
}