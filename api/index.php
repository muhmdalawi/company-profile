<?php

$tmpPaths = [
    '/tmp/views',
    '/tmp/cache',
    '/tmp/framework/cache',
    '/tmp/framework/sessions',
    '/tmp/framework/views',
];

foreach ($tmpPaths as $path) {
    if (! is_dir($path)) {
        mkdir($path, 0777, true);
    }
}

require __DIR__.'/../public/index.php';
