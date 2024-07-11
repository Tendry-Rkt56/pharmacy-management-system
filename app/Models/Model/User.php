<?php

namespace App\Models\Model;

use App\Models\Table;

class User extends Table
{

     public function count ()
     {
          $sql = "SELECT count(*) FROM users WHERE id > 0";
          return $this->db->getConn()->query($sql)->fetchColumn();
     }

     public function getAll (array $data = [])
     {
          $query = "SELECT count(*) FROM users WHERE users.id > 0";
          if (isset($data['search'])) {
               $search = $this->db->getConn()->quote('%'.$data['search'].'%');
               $query .= " AND (users.nom LIKE $search OR users.prenom LIKE $search OR users.email LIKE $search)";
          }
          $result = $this->db->getConn()->query($query);
          return $result->fetchColumn();
     }

     public function all (int $limit, int $offset, array $data = []): mixed
     {
          $query = "SELECT * FROM users WHERE users.id > 0";
          if (isset($data['search'])) {
               $search = $this->db->getConn()->quote('%'.$data['search'].'%');
               $query .= " AND (users.nom LIKE $search OR users.prenom LIKE $search OR users.email LIKE $search)";
          }
          $query .= " LIMIT $limit OFFSET $offset";
          $query = $this->db->getConn()->query($query);
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

     public function authenticate (array $data = [])
     {
          $sql = "SELECT * FROM users WHERE email = '$data[email]'";
          $user = $this->db->getConn()->query($sql)->fetch(\PDO::FETCH_OBJ);
          if ($user && password_verify($data['password'], $user->password)) {
               $_SESSION['user'] = $user;
               return true;
          }
          $_SESSION['danger'] = "Identifiants incorrects";
          return false;
     }

     public function register (array $data = [], array $files = [])
     {
          $sql = "INSERT INTO users(nom, prenom, email, roles, password, image) VALUES (:nom, :prenom, :email, :role, :password, :image)";
          $query = $this->db->getConn()->prepare($sql);
          extract($data);
          $query->bindValue(':nom', $nom, \PDO::PARAM_STR);
          $query->bindValue(':prenom', $prenom, \PDO::PARAM_STR);
          $query->bindValue(':email', $email, \PDO::PARAM_STR);
          $query->bindValue(':image', $this->checkImage($files['image']), \PDO::PARAM_STR);
          $query->bindValue(':role', $roles, \PDO::PARAM_STR);
          $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), \PDO::PARAM_STR);

          return $query->execute();
     }

     public function find (?int $id = null) 
     {
          $query = "SELECT * FROM users WHERE id = :id";
          $result = $this->db->getConn()->prepare($query);
          $result->bindValue(':id', $id, \PDO::PARAM_STR);
          $result->execute();
          return $result->fetch(\PDO::FETCH_OBJ) ?? null;
     }

     private function checkImage (array $image = [], ?int $id = null): mixed
     {
          $user = $this->find($id);
          try {
               $repertoire = 'image/users/';
               $imageFile = $repertoire . $image['name'];
               $extensions = ['jpeg', 'jpg', 'png'];
               $extension = pathinfo($image['name'], PATHINFO_EXTENSION); 
               if ($user->image == null && empty($image['tmp_name'])) return null;
               if ($user->image !== null && empty($image['tmp_name'])) return $user->image;
               else {
                    if (file_exists($user->image)) {
                         unlink($user->image);
                    }
                    if (in_array($extension, $extensions)) {
                         if (move_uploaded_file($image['tmp_name'], $imageFile)) {
                              return $imageFile;
                         }
                         else {
                              throw new \Exception('Erreur lors du téléchargement');
                         }
                    }
                    else {
                         throw new \Exception('Image pas pris en compte');
                    }
                    $response = true;
               }
     
          }
          catch(\Exception $e) {
               $response = null;
          }
          return $response;
     }

     public function update (int $id, array $data = [], array $files = [])
     {
          $stmt = $this->db->getConn()->prepare("UPDATE users SET nom = :nom, prenom = :prenom, email = :email, password = :password, image = :image WHERE id = :id");
          $password = password_hash($data['password'], PASSWORD_DEFAULT);
          $stmt->bindValue(':nom', $data['nom'], \PDO::PARAM_STR);
          $stmt->bindValue(':prenom', $data['prenom'], \PDO::PARAM_STR);
          $stmt->bindValue(':email', $data['email'], \PDO::PARAM_STR);
          $stmt->bindValue(':password', $password, \PDO::PARAM_STR);
          $stmt->bindValue(':image', $this->checkImage($files['image'], $id), \PDO::PARAM_STR);
          $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
          $_SESSION['success'] = "Votre profil a été modifiée";
          return $stmt->execute();
     }

     public function delete (int $id): bool
     {
          $user = $this->find($id);
          if (file_exists($user->image)) {
               unlink($user->image);
          }
          $stmt = $this->db->getConn()->prepare("DELETE FROM users WHERE id = :id");
          $stmt->bindValue(":id", $id);
          return $stmt->execute();
     }


}