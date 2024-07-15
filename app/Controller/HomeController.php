<?php

namespace App\Controller;

class HomeController extends Controller
{

     public function home ()
     {
          $medicaments = $this->app->getModel('medicament')->count();
          $categories = $this->app->getModel('category')->count();
          $users = $this->app->getModel('user')->count();
          $achats = $this->app->getModel('achat')->recent();
          $ventes = $this->app->getModel('achat')->recentTotal();
          return $this->render('home.homes', [
               'medicaments' => $medicaments,
               'users' => $users,
               'categories' => $categories,
               'achats' => $achats,
               'ventes' => $ventes,
          ]);
     }

     public function index ()
     {
          $medicaments = $this->app->getModel('medicament')->count();
          $categories = $this->app->getModel('category')->count();
          $users = $this->app->getModel('user')->count();
          $achats = $this->app->getModel('achat')->recentTotal();
          return $this->render('home.userHome',[
               'medicaments' => $medicaments,
               'users' => $users,
               'categories' => $categories,
               'achats' => $achats,
          ]);
     }

}

?>