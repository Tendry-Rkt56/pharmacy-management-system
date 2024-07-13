<?php

namespace App\Middleware;

class UsersMiddleware 
{

     private $protected = ['/login'];
     private $uri;

     public function __construct()
     {
          if (session_status() == PHP_SESSION_NONE) session_start();
          $this->uri = $_SERVER['REQUEST_URI'];
          $this->redirect();
     }

     public function redirect ()
     {
          if (!empty($this->uri) && !in_array($this->uri, $this->protected) && !isset($_SESSION['user'])) {
               header('Location: /login');
               exit();
          }
          else if (!empty($this->uri) && in_array($this->uri, $this->protected) && isset($_SESSION['user'])) {
               header('Location: /');
               exit();
          }
     }

     public function isAdmin ()
     {
          if (strtoupper($_SESSION['user']->roles) == "USER") {
               header('Location: /error');
               exit();
          }
     }
}


?>