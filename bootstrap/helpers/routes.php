<?php


if(!function_exists('user_routes')){

    function user_routes($name = null)
    {
        $route_prefix = env('ROUTE_PREFIX', "my|admin");
        $user_routes  = explode("|", $route_prefix);

        return $name? $user_routes[$name]: $user_routes;
    }
}
