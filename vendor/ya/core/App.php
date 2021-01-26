<?php


namespace ya;


class App
{
   public function  __construct() {
       $query = trim($_SERVER['QUERY_STRING'], '/');
       session_start();
       self::$app = Registry::instance();
       $this->getParams();
       new ErrorHandler();
       Router::dispatch($query);
   }

   public static $app;

   protected  function getParams(){
       $params = require_once CONF . '/params.php';
       if(!empty($params)){
           foreach ($params as $k=> $v){
               self::$app->setProperty($k, $v);
           }
       }
   }

}