<?php 

namespace App\Controller;

class UserController extends Controller 
{

     public function index (array $data = [])
     {
          $count = $this->app->getModel('user')->getAll($data);
          $page = $data['page'] ?? 1;
          $limit = !isset($data['limit']) || $data['limit'] <= 0 ? 10 : $data['limit'];
          $maxPages = ceil($count / $limit);
          $offset = ($page - 1) * $limit;
          $users = $this->app->getModel('user')->all($limit, $offset, $data);
          $countArticles = count($users);
          return $this->render('admin.users.index', [
               'page' => $page,
               'count' => $count,
               'limit' => $limit,
               'maxPages' => $maxPages,
               'data' => $data,
               'countArticles' => $countArticles,
               'users' => $users,
          ]);
     }

     public function login ()
     {
          return $this->render('user.logins');
     }

     public function authentication (array $data = [])
     {
          $auth = $this->app->getModel('user')->authenticate($data);
          if ($auth) {
               $user = $_SESSION['user'];
               if (strtoupper($user->roles) == "ADMIN") {
                    header('Location: /'); exit();
               }
               else {
                    header('Location: /users'); exit(); 
               }
          }
          else {
               header('Location: /login'); exit();
          }
     }

     public function create ()
     {
          return $this->render('user.registration');
     }

     public function registration (array $data = [], array $files = [])
     {
          $registration = $this->app->getModel('user')->register($data, $files);
          if ($registration) {
               header('Location: /user'); exit();
          }
          else {
               header('Location: /new'); exit();
          }
     }

     public function edit ()
     {
          return $this->render('user.edit', [
               'user' => $_SESSION['user'],
          ]);
     }

     public function update (array $data = [], array $files = []) 
     {
          $update = $this->app->getModel('user')->update($_SESSION['user']->id, $data, $files);
          if ($update) {
               header('Location: /user/'.$_SESSION['user']->id); exit();
               exit();
          }
          else {
               header('Location: /user/edit'); exit();
          }
     }

     public function profil (int $id)
     {
          $users = $this->app->getModel('user')->getOne($id);
          return $this->render('user.profil', [
               'users' => $users,
               'id' => $_SESSION['user']->id,
          ]);
     }

     public function logout ()
     {
          session_destroy();
          header('Location: /login');
          exit();
     }

}