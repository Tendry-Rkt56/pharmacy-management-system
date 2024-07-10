<?php

namespace App\Models\Model;

use App\Models\Table;

class Medicament extends Table
{

     public function count ()
     {
          $query = $this->db->getConn()->query("SELECT count(*) FROM medicament WHERE id > 0");
          return $query->fetchColumn();
     }

     // private function checkImage (array $image = [], int $id = null): mixed
     // {
     //      // $article = $this->getArticle($id);
     //      try {
     //           $repertoire = 'image/articles/';
     //           $imageFile = $repertoire . $image['name'];
     //           $extensions = ['jpeg', 'jpg', 'png'];
     //           $extension = pathinfo($image['name'], PATHINFO_EXTENSION); 
     //           if ($article->image == null && empty($image['tmp_name'])) return null;
     //           if ($article->image !== null && empty($image['tmp_name'])) return $article->image;
     //           else {
     //                if (file_exists($article->image)) {
     //                     unlink($article->image);
     //                }
     //                if (in_array($extension, $extensions)) {
     //                     if (move_uploaded_file($image['tmp_name'], $imageFile)) {
     //                          return $imageFile;
     //                     }
     //                     else {
     //                          throw new \Exception('Erreur lors du téléchargement');
     //                     }
     //                }
     //                else {
     //                     throw new \Exception('Image pas pris en compte');
     //                }
     //                $response = true;
     //           }
     
     //      }
     //      catch(\Exception $e) {
     //           $response = null;
     //      }
     //      return $response;
     // }

     /**
     * Insère un nouvel article dans la base de donnée
     * @param array $data
     * @return bool
     */
     public function create (array $data = []): bool
     {
          $query = "INSERT INTO medicament (nom, prix, category_id, ordonnance) VALUES (:nom, :prix, :category, :ordonnance)";
          $result = $this->db->getConn()->prepare($query);
          extract($data);
          $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
          $result->bindValue(':prix', $prix, \PDO::PARAM_INT);
          $result->bindValue(':category', $category, \PDO::PARAM_INT);
          $result->bindValue(':ordonnance', $ordonnance, \PDO::PARAM_INT);
          $_SESSION['success'] =  'Médicament ajouté';
          return $result->execute();
     }

     public function getAll (array $data = [])
     {
          $query = "SELECT count(*) FROM medicament 
                    LEFT JOIN category ON (category.id = medicament.category_id) WHERE medicament.id > 0";
          if (isset($data['category']) && $data['category'] != 1000) {
               $query .= " AND medicament.category_id = '$data[category]'";
          }
          if (isset($data['search'])) {
               $search = $this->db->getConn()->quote('%'.$data['search'].'%');
               $query .= " AND medicament.nom LIKE $search";
          }
          $result = $this->db->getConn()->query($query);
          return $result->fetchColumn();
     }

     /**
     * Recupère tous les articles dans la base de donnée
     * @return mixed   
     */
     public function all (int $limit, int $offset, array $data = []): mixed
     {
          $query = "SELECT medicament.*, category.nom AS category FROM medicament 
                    LEFT JOIN category ON (category.id = medicament.category_id) WHERE medicament.id > 0";
          if (isset($data['category']) && $data['category'] != 1000) {
               $query .= " AND medicament.category_id = '$data[category]'";
          }
          if (isset($data['search'])) {
               $search = $this->db->getConn()->quote('%'.$data['search'].'%');
               $query .= " AND medicament.nom LIKE $search";
          }
          $query .= " LIMIT $limit OFFSET $offset";
          $query = $this->db->getConn()->query($query);
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

     /**
     * Supprime un article en fonction de l'id de l'article
     * @param int $id
     * @return bool 
     */
     public function delete (int $id): bool
     {
          $query = "DELETE FROM medicament WHERE id = :id";
          $result = $this->db->getConn()->prepare($query);
          $result->bindValue(":id", $id, \PDO::PARAM_INT);
          $_SESSION['danger'] = "Médicament N° $id supprimé";
          return $result->execute();
     }

     /**
     * Mise à jour d'un article en fonction de son id
     * @param int $id
     * @param array $data
     * @return bool
     */
     public function update (int $id, array $data = []): bool
     {
          $query = "UPDATE medicament SET nom = :nom, prix = :prix, category_id = :category, ordonnance = :ordonnance WHERE id = :id";
          $result = $this->db->getConn()->prepare($query);
          extract($data);
          $result->bindValue(":nom", $nom, \PDO::PARAM_STR);
          $result->bindValue(":prix", $prix, \PDO::PARAM_INT);
          $result->bindValue(":id", $id, \PDO::PARAM_INT);
          $result->bindValue(":category", $category, \PDO::PARAM_INT);
          $result->bindValue(":ordonnance", $ordonnance, \PDO::PARAM_INT);
          $_SESSION['success'] = "Médicament N° $id mis à jour";
          return $result->execute();
     }

     /**
     * Recupère un article en particulier dans la base de donnée
     * @param int $id
     * @return mixed
     */
     public function getOne (?int $id = null): mixed
     {
          $query = "SELECT medicament.id AS articleId, medicament.nom AS nomMed, medicament.prix AS prix, medicament.ordonnance AS ordonnance,
                    category.id AS categoryId, category.nom AS nomCategory FROM medicament LEFT JOIN category ON (category.id = medicament.category_id) WHERE medicament.id = :id";
          $result = $this->db->getConn()->prepare($query);
          $result->bindValue(':id', $id, \PDO::PARAM_STR);
          $result->execute();
          return $result->fetch(\PDO::FETCH_OBJ) ?? null;
     }

}

?>