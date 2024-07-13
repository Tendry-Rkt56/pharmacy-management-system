<?php

namespace App\Controller;

class UsersController extends Controller 
{

     public function medicaments (array $data = [])
     {
          $count = $this->app->getModel('medicament')->getAll($data);
          $page = $data['page'] ?? 1;
          $limit = $data['limit'] ?? 15;
          $maxPages = ceil($count / $limit);
          $offset = ($page - 1) * $limit;
          $medicaments = $this->app->getModel('medicament')->all($limit, $offset, $data);
          $categories = $this->app->getModel('category')->getAll();
          $countArticles = count($medicaments);
          return $this->render('user.medicaments', [
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

     public function category (array $data = [])
     {
          $count = $this->app->getModel('category')->count();
          $page = isset($data['page']) ? $data['page'] : 1;
          $limit = 5;
          $offset = ($page - 1) * $limit;
          $maxPages = ceil($count / $limit);
          $categories = $this->app->getModel('category')->all($limit, $offset);
          return $this->render('user.category', [
               'token' => $_SESSION['token'],
               'categories' => $categories,
               'page' => $page,
               'maxPages' => $maxPages,
          ]);
     }

     public function vueProfil (int $id) 
     {
          $users = $this->app->getModel('user')->getOne($id);
          return $this->render('user.profil.profil', [
               'users' => $users,
               'id' => $_SESSION['user']->id,
          ]);
     }

     public function editProfil ()
     {
          return $this->render('user.profil.edit', [
               'user' => $_SESSION['user'],
          ]);
     }

     public function updateProfil (array $data = [], array $files = []) 
     {
          $update = $this->app->getModel('user')->update($_SESSION['user']->id, $data, $files);
          if ($update) {
               header('Location: /users/profil/'.$_SESSION['user']->id); exit();
               exit();
          }
          else {
               header('Location: /users/profil/edit'); exit();
          }
     }

     public function users (array $data = [])
     {
          $count = $this->app->getModel('user')->getAll($data);
          $page = $data['page'] ?? 1;
          $limit = !isset($data['limit']) || $data['limit'] <= 0 ? 10 : $data['limit'];
          $maxPages = ceil($count / $limit);
          $offset = ($page - 1) * $limit;
          $users = $this->app->getModel('user')->all($limit, $offset, $data);
          $countArticles = count($users);
          return $this->render('user.users', [
               'page' => $page,
               'count' => $count,
               'limit' => $limit,
               'maxPages' => $maxPages,
               'data' => $data,
               'countArticles' => $countArticles,
               'users' => $users,
          ]);
     }

}