<?php


/* Basic autoloader */
spl_autoload_register(function (string $class): void {
    $prefix = 'Modular\\';
    $baseDir = __DIR__ . '/../src/';

    if (!str_starts_with($class, $prefix)) {
        return;
    }

    $relativeClass = substr($class, strlen($prefix));
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (is_file($file)) {
        require $file;
    }
});

/* Initialize kernel */
$app = new \Modular\Kernel();

/* App entry point */
$app->run();