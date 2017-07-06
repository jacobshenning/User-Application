<?php

$scripts = Scripts(['test']);

$test = 'test';

$title = 'test';

include '../private/views/snippets/head.php';

echo '<body>';

include '../private/views/home/home.shtml';

include '../private/views/snippets/scripts.php';

echo '</body>';

?>
