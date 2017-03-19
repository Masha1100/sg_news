<?php

require_once '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

// $_SERVER['REQUEST_URI'] = preg_replace('|/$|', '', $_SERVER['REQUEST_URI'], 1);
$request = Request::createFromGlobals();
$session = new Session();
$session->start();

$request->setSession($session);

$routes = new RouteCollection();

$routes->add('get_login', new Route('/login', array('_controller' => function ($request) {
    echo 'SHOW FORM HERE ';

    echo '<form action="/login" method="POST">

    <input name="name">
    <input name="pass">
    <input type="submit">
</form>';
}), array(), array(), '', array(), array('GET')));

$routes->add('post_login', new Route('/login', array('_controller' => function ($request) {

    echo 'CHECK USER AND STORE HER IN SESSION';
    $post = $request->request->all();
    var_dump($post);
    $session = $request->getSession();

    // echo 'LOGIN ' . $name;
}), array(), array(), '', array(), array('POST')));

$routes->add('logout', new Route('/logout', array('_controller' => function ($request) {
    echo 'LOGOUT';

    // $session->invalidate();

}), array(), array(), '', array(), array('GET')));

$routes->add('cabinet', new Route('/cabinet', array('_controller' => function ($request) {

    // Check if user was set in Session
    echo 'CABINET';
    var_dump($request->query->get('users')[0]);
}), array(), array(), '', array(), array('GET')));

$routes->add('front_route', new Route('', array('_controller' => function () {

    $db = new PDO("mysql:host=localhost;dbname=sg_news;charset=utf8", "root", "123");
    $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 50";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $items = $stmt->fetchAll();
    include '../templates/index.tpl.php';

})));


$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

try {
    $parameters = $matcher->matchRequest($request);
} catch (Symfony\Component\Routing\Exception\ResourceNotFoundException $e) {
    echo '404';
    die();
}

$action = $parameters['_controller'];

if (is_callable($action)) {
    $action($request);
}