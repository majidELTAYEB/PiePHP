<?php
    
    namespace Core;
    
    class Core
    {
        public function run() {
            require_once(implode(DIRECTORY_SEPARATOR , ['src', 'routes.php']));
            //echo __CLASS__ . " [OK]" . PHP_EOL; 
            $yoyo = new Router;
            $url = $_SERVER['REQUEST_URI'];
        
            //var_dump($url);
            $url = str_replace(BASE_URI, '', $url); 
            //var_dump($url);
            //var_dump($url);
            $yeye = $yoyo::get($url);
            //var_dump($yeye);
            
             $array = [];
             $majid = [];
      //var_dump($url);

      $users = array_flip($yeye);
      
      array_walk($users, function(&$value, $key) {
          $value = "{$key} {$value}";
      });
       $string =  implode(' ', $users);
       $array = explode(' ',$string);
       $array[1] .= ',';

        $controllere = $array[1];
      
       foreach($array as $key => $value){
         if ($key != 2){
         array_push($majid,ucfirst($value)) ;
         }
         if($key === 2){
          array_push($majid,$value);
         }
      
       }
       $omar = implode('', $majid);
       $final = explode(',',$omar);
       $city =[$final[0] => $final[1]];
       //var_dump($city[1]);

       //$tene = new \Controller\AppController;
       //$tene->indexAction();
           $controllere = ucfirst($controllere);
           $controllere = substr($controllere, 0, -1);
       //var_dump($city);
           foreach($city as $cle => $valeur){
               $route = $controllere.'\\'.$cle;
               (new $route())->$valeur();
               //var_dump($valeur);
               
            //var_dump($route);
               //(new $route)->$valeur;
        }
    }
}