<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application;

$app->redirectIfTrailingSlash();

$env = $app->detectEnvironment(array(
    'local' => array('DNS'),
));

$app->bindInstallPaths(require __DIR__.'/paths.php');

$framework = $app['path.base'].'/vendor/laravel/framework/src';

require $framework.'/Illuminate/Foundation/start.php';

return $app;
