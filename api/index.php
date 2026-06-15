<?php

require __DIR__ . '/../vendor/autoload.php';

// Pastikan direktori ini ada di /tmp
$tmpDirs = ['/tmp/storage/framework/cache', '/tmp/storage/framework/views', '/tmp/storage/logs', '/tmp/bootstrap/cache'];
foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) mkdir($dir, 0755, true);
}

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);