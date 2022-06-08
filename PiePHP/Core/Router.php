<?php
Namespace Core;
class Router{
     private static $routes ;
     public static function connect($url,$route)
     {
       self::$routes[$url] = $route;
       
      }
     public static function get($url)
     {
       foreach(self::$routes as $k => $v){
         if($k === $url){
          return self::$routes[$url];
         }
       }
       $newLink = substr($url, 1);
       $newLink = explode('/',$newLink);
       return ['Controller' => $newLink[0], 'Action' => $newLink[1]];
     }
}