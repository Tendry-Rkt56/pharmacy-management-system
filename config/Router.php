<?php

use App\Container;
use App\Controller\CategoryController;
use App\Controller\ErrorController;
use App\Controller\HomeController;
use App\Controller\MedicamentController;
use App\Controller\UserController;
use App\Middleware\UsersMiddleware;

require_once '../vendor/altorouter/altorouter/AltoRouter.php';

$middleware = new UsersMiddleware();


$router = new AltoRouter();

$container = new Container();

$router->map('GET', '/', function() use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(HomeController::class)->home();
}); 

// Routes pour les médicaments

$router->map('GET', '/medicament', function() use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(MedicamentController::class)->index($_GET);
}); 

$router->map('POST', '/medicament/[i:id]', function($id) use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(MedicamentController::class)->delete($id);
});

$router->map('GET', '/medicament/new', function() use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(MedicamentController::class)->create();
}); 

$router->map('POST', '/medicament/new', function() use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(MedicamentController::class)->store($_POST);
});

$router->map('GET', '/medicament/edit/[i:id]', function ($id) use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(MedicamentController::class)->edit($id);
});

$router->map('POST', '/medicament/edit/[i:id]', function($id) use ($container, $middleware){
     $middleware->isAdmin();
     $container->getController(MedicamentController::class)->update($id, $_POST);
});

// Routes pour les médicaments

// Routes pour les catégories
$router->map('GET', '/category', function() use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(MedicamentController::class)->index($_GET);
}); 

$router->map('POST', '/category-[i:id]', function ($id) use($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(CategoryController::class)->delete($id);
});

$router->map('GET', '/category/new', function () use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(CategoryController::class)->create();
});

$router->map('POST', '/category/new', function () use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(CategoryController::class)->store($_POST);
});

$router->map('GET', '/category/edit/[i:id]', function ($id) use($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(CategoryController::class)->edit($id);
});

$router->map('POST', '/category/edit/[i:id]', function ($id) use($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(CategoryController::class)->update($id, $_POST);
});

$router->map('POST', '/category/[i:id]', function ($id) use($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(CategoryController::class)->delete($id);
});
// Routes pour les catégories

$router->map('GET', '/login', fn () => $container->getController(UserController::class)->login());

$router->map('POST', '/login', fn () => $container->getController(UserController::class)->authentication($_POST));

$router->map('POST', '/logout', fn () => $container->getController(UserController::class)->logout());

$router->map('GET', '/user/new', function () use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(UserController::class)->create();
});

$router->map('POST', '/user/new', function () use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(UserController::class)->registration($_POST, $_FILES);
});

$router->map('GET', '/user/edit/[i:id]', function ($id) use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(UserController::class)->edit($id);
});

$router->map('POST', '/user/edit/[i:id]', function ($id) use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(UserController::class)->update($id, $_POST, $_FILES);
});

$router->map('GET', '/user', function () use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(UserController::class)->index($_GET);
});

$router->map('GET', '/user/[i:id]', function ($id) use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(UserController::class)->profil($id);
});


//------------------------------------------------------------------

$router->map('GET', '/users', function () use ($container) {
     $container->getController(HomeController::class)->index();
});

$router->map('GET', '/error', function () use ($container) {
     $container->getController(ErrorController::class)->accessDenied();
});


$match = $router->match();
if ($match !== null) {
     if (is_callable($match['target'])){
         call_user_func_array($match['target'], $match['params']);
     }
}
?>