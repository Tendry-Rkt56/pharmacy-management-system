<?php

namespace App\Controller;

class AdminController extends Controller
{

     public function achats (array $data = [])
     {
          $count = $this->app->getModel('achat')->getAll();
          $page = $data['page'] ?? 1;
          $limit = $data['limit'] ?? 15;
          $maxPages = ceil($count / $limit);
          $offset = ($page - 1) * $limit;
          $achats = $this->app->getModel('achat')->all($limit, $offset);
          $countAchats = count($achats);
          return $this->render('admin.achats.index', [
               'page' => $page,
               'count' => $count,
               'limit' => $limit,
               'maxPages' => $maxPages,
               'achats' => $achats,
               'countAchats' => $countAchats,
          ]);
     }

}