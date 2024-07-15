<?php

use App\Container;
use App\Controller\AchatController;
use App\Controller\AdminController;
use App\Controller\APIController;
use App\Controller\CategoryController;
use App\Controller\ErrorController;
use App\Controller\HomeController;
use App\Controller\MedicamentController;
use App\Controller\UserController;
use App\Controller\UsersController;
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
     $container->getController(CategoryController::class)->index($_GET);
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

$router->map('GET', '/user/edit', function () use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(UserController::class)->edit();
});

$router->map('POST', '/user/edit', function () use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(UserController::class)->update($_POST, $_FILES);
});

$router->map('GET', '/user', function () use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(UserController::class)->index($_GET);
});

$router->map('GET', '/user/[i:id]', function ($id) use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(UserController::class)->profil($id);
});

$router->map('POST', '/user/delete/[i:id]', function ($id) use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(UserController::class)->delete($id);
});

// Routes pour les catégories
// Routes pour les achats

$router->map('GET', '/ventes', function () use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(AdminController::class)->achats($_GET);
});

$router->map('GET', '/details/[i:id]', function ($id) use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(AdminController::class)->details($id);
});

$router->map('POST', '/vente/delete/[i:id]', function ($id) use ($container, $middleware) {
     $middleware->isAdmin();
     $container->getController(AchatController::class)->delete($id);
});


// Routes pour les achats

//------------------------------------------------------------------

$router->map('GET', '/users', function () use ($container) {
     $container->getController(HomeController::class)->index();
});

$router->map('GET', '/users/medicaments', function () use ($container) {
     $container->getController(UsersController::class)->medicaments($_GET);
});

$router->map('GET', '/users/categories', function () use ($container) {
     $container->getController(UsersController::class)->category($_GET);
});

$router->map('GET', '/users/profil/[i:id]', function ($id) use ($container) {
     $container->getController(UsersController::class)->vueProfil($id);
});

$router->map('GET', '/users/profil/edit', function () use ($container) {
     $container->getController(UsersController::class)->editProfil();
});

$router->map('POST', '/users/profil/edit', function () use ($container) {
     $container->getController(UsersController::class)->updateProfil($_POST, $_FILES);
});

$router->map('GET', '/users/listes', function () use ($container) {
     $container->getController(UsersController::class)->users($_GET);
});

$router->map('GET', '/error', function () use ($container) {
     $container->getController(ErrorController::class)->accessDenied();
});

//---------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------
$router->map('GET', '/users/vente', function () use ($container) {
     $container->getController(AchatController::class)->index($_GET);
});

$router->map('GET', '/users/details/[i:id]', function ($id) use ($container) {
     $container->getController(AchatController::class)->details($id);
});

$router->map('GET', '/users/vente/new', function () use ($container) {
     $container->getController(AchatController::class)->create();
});

$router->map('POST', '/users/vente/new', function () use ($container) {
     $container->getController(AchatController::class)->store($_POST);
});
//-------------------------------------------------------------------

// Routes pour les API
$router->map('GET', '/API/medicament', function () use ($container) {
     $container->getController(APIController::class)->medicament($_GET);
});
// Routes pour les API


$match = $router->match();
if ($match !== null) {
     if (is_callable($match['target'])){
         call_user_func_array($match['target'], $match['params']);
     }
}
?>