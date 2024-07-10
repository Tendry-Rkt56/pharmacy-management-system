<?php

namespace App\Controller;

class MedicamentController extends Controller
{

     public function index (array $data = [])
     {
          $count = $this->app->getModel('medicament')->getAll($data);
          $page = $data['page'] ?? 1;
          $limit = $data['limit'] ?? 15;
          $maxPages = ceil($count / $limit);
          $offset = ($page - 1) * $limit;
          $medicaments = $this->app->getModel('medicament')->all($limit, $offset, $data);
          $categories = $this->app->getModel('category')->getAll();
          $countArticles = count($medicaments);
          return $this->render('medicaments.index', [
               'page' => $page,
               'count' => $count,
               'limit' => $limit,
               'maxPages' => $maxPages,
               'medicaments' => $medicaments,
               'categories' => $categories,
               'data' => $data,
               'countArticles' => $countArticles,
          ]);
     }

     public function create ()
     {
          $categories = $this->app->getModel('category')->getAll();
          return $this->render('medicaments.create', [
               'categories' => $categories,
               'token' => $_SESSION['token'],
          ]);
     }

     public function store (array $data = [])
     {
          $store = $this->app->getModel('medicament')->create($data);
          if ($store) {
               header('Location: /medicament'); exit();
          }
     }

     public function delete (int $id)
     {
          $delete = $this->app->getModel('medicament')->delete($id);
          if ($delete) {
               header('Location: /medicament');
               exit();
          }
     }

     public function edit (int $id)
     {
          $medicament = $this->app->getModel('medicament')->getOne($id);
          $categories = $this->app->getModel('category')->getAll();
          return $this->render('medicaments.edit', [
               'medicament' => $medicament,
               'token' => $_SESSION['token'],
               'categories' =>$categories,
          ]);
     }

     public function update (int $id, array $data = [])
     {    
          $update = $this->app->getModel('medicament')->update($id, $data);
          if ($update) {
               header('Location: /medicament'); exit();
          }
     }

}