<?php

namespace App\Controller;

class HomeController extends Controller
{

     public function home (array $data = [])
     {
          $medicaments = $this->app->getModel('medicament')->count();
          return $this->render('home.index', [
               'medicaments' => $medicaments,
          ]);
     }

}

?>