<?php

namespace App\Controller;

class HomeController extends Controller
{

     public function home ()
     {
          $medicaments = $this->app->getModel('medicament')->count();
          $categories = $this->app->getModel('category')->count();
          $users = $this->app->getModel('user')->count();
          return $this->render('home.homes', [
               'medicaments' => $medicaments,
               'users' => $users,
               'categories' => $categories,
          ]);
     }

}

?>