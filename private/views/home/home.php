<?php

Snippet('head');

echo '<body>';

include '../private/views/home/home.shtml';

$scripts = Scripts(['test']);

Snippet('scripts');

echo '</body>';

?>
