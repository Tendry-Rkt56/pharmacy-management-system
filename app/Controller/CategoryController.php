<?php

namespace App\Controller;

class CategoryController extends Controller 
{

     public function index (array $data = [])
     {
          $count = $this->app->getModel('category')->count();
          $page = isset($data['page']) ? $data['page'] : 1;
          $limit = 5;
          $offset = ($page - 1) * $limit;
          $maxPages = ceil($count / $limit);
          $categories = $this->app->getModel('category')->all($limit, $offset);
          return $this->render('category.index', [
               'token' => $_SESSION['token'],
               'categories' => $categories,
               'page' => $page,
               'maxPages' => $maxPages,
          ]);
     }

     public function create ()
     {
          return $this->render('category.create', [
               'token' => $_SESSION['token'],
          ]);
     }

     public function store ()
     {
          $store = $this->app->getModel('category')->create($_POST);
          if ($store) {
               header('Location: /category'); exit();
          }
     }

     public function edit (int $id)
     {
          $category = $this->app->getModel('category')->find($id);
          return $this->render('category.edit', [
               'token' => $_SESSION['token'],
               'category' => $category,
          ]);
     }

     public function update (int $id, array $data = []) 
     {
          $update = $this->app->getModel('category')->update($id, $data);
          if ($update) {
               header('Location: /category'); exit();
          }
     }

     public function delete (int $id)
     {
          $delete = $this->app->getModel('category')->delete($id);
          if ($delete) {
               header('Location: /category'); exit();
          }
     }

}