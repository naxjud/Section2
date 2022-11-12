<?php 

//get the request_uri (/contact?foo=bar) and then take just the first 
//part using parse_url without the query e.g.:
// ?foo=bar

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// var_dump($uri);

//here is a list of routes we have on our Website
$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

/**
 * Function routeToController
 * Parameter: Url und routes
 * route to the right pages depending of the request Uri
 * 
 */
function routeToController($uri, $routes) {

    //look for a uri in the routes array
    if (array_key_exists($uri, $routes)){
        require $routes[$uri];
    }
    else { //if uri not found in the routes
        abort();
    }

}

/**
 * Function abort
 * parameter Error Code with the standard value 404
 * so you can call this function without parameter
 */
function abort($code = 404){
    //throw error code
    http_response_code($code);

    //call the error page
    require "views/{$code}.php";
    
    //end the application
    die();
}

routeToController($uri, $routes);