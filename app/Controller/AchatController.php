<?php 

namespace App\Controller;

class AchatController extends Controller
{

     public function index ()
     {
          $count = $this->app->getModel('achat')->getAll();
          $page = $data['page'] ?? 1;
          $limit = $data['limit'] ?? 15;
          $maxPages = ceil($count / $limit);
          $offset = ($page - 1) * $limit;
          $achats = $this->app->getModel('achat')->all($limit, $offset);
          $countAchats = count($achats);
          return $this->render('achats.index', [
               'page' => $page,
               'count' => $count,
               'limit' => $limit,
               'maxPages' => $maxPages,
               'achats' => $achats,
               'countAchats' => $countAchats,
          ]);
     }

     public function create ()
     {
          return $this->render('achats.create');
     }

     public function details (int $id)
     {
          $details = $this->app->getModel('achat')->details($id);
          $achat = $this->app->getModel('achat')->find($id);
          return $this->render('achats.details', [
               'achat' => $achat,
               'details' => $details,
          ]);
     }






}

?>