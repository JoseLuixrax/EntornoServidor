<?php
/* Ver errores */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * FRONTCONTROLLER
 * 
 * 
 * Index que usa difrentes puglins de composer:
 * - aura para el enrutador
 * - twig para la vista
 * 
 * 
 * 
 */

require_once '../vendor/autoload.php';
use Dotenv\Dotenv;

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;
use Laminas\Diactoros\Response\RedirectResponse;


$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $_ENV['DBHOST'],
    'database'  => $_ENV['DBNAME'],
    'username'  => $_ENV['DBUSER'],
    'password'  => $_ENV['DBPASS'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();


// Crear a server request objeto
$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

function redirect($path) {
    return new RedirectResponse($path);
}

// Crear el contenedor de rutas y conseguir el mapa de ruteo
$routerContainer = new Aura\Router\RouterContainer();
$map = $routerContainer->getMap();

// Añadir una ruta al mapa, y manejarse por ella

$map->get('index', 'sysblog/index.php', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);

$map->get('about', 'sysblog/about', [
    'controller' => 'App\Controllers\PageController',
    'action' => 'aboutAction'
]);

$map->get('contact', 'sysblog/contact', [
    'controller' => 'App\Controllers\PageController',
    'action' => 'contactAction'
]);

$map->post('contactSend', 'sysblog/contact', [
    'controller' => 'App\Controllers\PageController',
    'action' => 'contactActionSend'
]);

$map->get('blog', 'sysblog/blog/{id}', [
    'controller' => 'App\Controllers\BlogController',
    'action' => 'showBlogAction'
])->tokens(['id'=>'\d+']); 

/* $map->get('comentario', '/contact/comentario', [
    'controller' => 'App\Controllers\PageController',
    'action' => 'contactAction'
]);

$map->post('save-post', '/contact/save-post', [
    'controller' => 'App\Controllers\PostController',
    'action' => 'savePost'
]);
 */

// Añadir la ruta encontrada desde el contenedor de rutas
$matcher = $routerContainer->getMatcher();

// ...y intentar coincididir la respuesta con la ruta
$route = $matcher->match($request);
if (!$route) {
    echo "No encontrada la ruta";
    exit;
    // Si no se encuentra la ruta
    /* , devolver una respuesta 404
    $response = new Laminas\Diactoros\Response\HtmlResponse(
        '<h1>404</h1>',
        404
    ); */
} else {
    // Si se encuentra la ruta, ejecutar la acción asociada
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    $response = $controller->$actionName($request);
    foreach ($response->getHeaders() as $name => $values) {
        foreach ($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }
    http_response_code($response->getStatusCode());
    echo $response->getBody();
}

// Añade atributos de ruta a la peticion
foreach ($route->attributes as $key => $val) {
    $request = $request->withAttribute($key, $val);
}

// dispatch the request to the route handler.
// (consider using https://github.com/auraphp/Aura.Dispatcher
// in place of the one callable below.)
/* $callable = $route->handler;
$response = $callable($request); */

// emit the response
/* foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}
http_response_code($response->getStatusCode());
echo $response->getBody(); */