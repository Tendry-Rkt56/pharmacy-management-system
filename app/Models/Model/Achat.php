<?php

namespace App\Models\Model;

use App\Models\Table;

class Achat extends Table
{

     /**
     * Récupère toutes les achats
     * @param int $limit
     * @param int $offset
     * @return Object
     */
     public function all (int $limit, int $offset): mixed
     {
          $query = "SELECT * FROM achat";  
          $query .= " LIMIT $limit OFFSET $offset";
          $query = $this->db->getConn()->query($query);
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

     /**
      * Rétourne le nombre
      */
     public function getAll ()
     {
          $query = "SELECT count(*) FROM achat"; 
          $result = $this->db->getConn()->query($query);
          return $result->fetchColumn();
     }

     public function find (int $id) 
     {
          $sql = "SELECT a.id AS id, a.total AS total, a.createdAt AS createdAt, u.nom AS nom, u.email  AS email, u.prenom AS prenom, u.adresse AS adresse 
                  FROM achat a INNER JOIN users u ON u.id = a.user_id WHERE a.id = :id";
          $query = $this->db->getConn()->prepare($sql);
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          $query->execute();
          return $query->fetch(\PDO::FETCH_OBJ);
     }

     public function recent ()
     {
          $sql = "SELECT a.id AS id, a.total AS total, a.createdAt AS createdAt, a.isEffectue AS isEffectue, u.nom AS nom, u.image AS image, u.email AS email, u.prenom AS prenom, u.adresse AS adresse 
                  FROM achat a INNER JOIN users u ON u.id = a.user_id ORDER BY a.id DESC LIMIT 5";
          $query = $this->db->getConn()->query($sql);
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

     public function details (int $id)
     {
          $sql = "SELECT m.nom AS nom, m.prix AS prix, a.total AS total, a.createdAt AS dates, d.nombre AS nombre 
                  FROM details d INNER JOIN medicament m ON d.medicament_id = m.id INNER JOIN achat a ON a.id = d.achat_id
                  WHERE a.id = :id";
          $query = $this->db->getConn()->prepare($sql);
          $query->bindValue(':id', $id, \PDO::PARAM_INT);
          $query->execute();
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

     private function arrangeData (array $data)
     {
          $ids = [];
          foreach ($data as $donnee => $value) {
               if (str_contains($donnee, 'medicament')) {
                    (int)$id = substr($donnee, strlen('medicament-'));
                    $ids[$id] = $value;
               }
          }
          return $ids;
     }

     public function updateMedicament (int $id, int $nombre)
     {
          $sql = "UPDATE medicament SET nombre = :nombre WHERE id = :id";
          $result = $this->db->getConn()->prepare($sql);
          $result->bindValue(':nombre', $nombre, \PDO::PARAM_INT);
          $result->bindValue(':id', $id, \PDO::PARAM_INT);
          $result->execute();
     }

     private function getTotal (array $data = [])
     {
          // var_dump($this->arrangeData($data)); die();
          $donnee = $this->arrangeData($data);
          $ids = array_keys($this->arrangeData($data));
          $ids = implode(',', $ids);
          $sql = "SELECT * FROM medicament WHERE id IN ($ids)";
          $medicaments = $this->db->getConn()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
          $total = 0;
          foreach($medicaments as $medicament) {
               $this->updateMedicament($medicament->id, ($medicament->nombre - $donnee[$medicament->id]));
               $total += $medicament->prix * $donnee[$medicament->id];
          }
          return $total;
     }

     private function insertDetails (array $data = [], int $achat)
     {
          $sql = "INSERT INTO details (medicament_id, nombre, achat_id) VALUES (:medicament, :nombre, :achat)";
          $result = $this->db->getConn()->prepare($sql);
          foreach($this->arrangeData($data) as $id => $value) {
               $result->bindValue(':medicament', $id, \PDO::PARAM_INT);
               $result->bindValue(':nombre', $value, \PDO::PARAM_INT);
               $result->bindValue(':achat', $achat, \PDO::PARAM_INT);
               $result->execute();
          }
          return true;
     }

     public function store (array $data = [])
     {
          $sql = "INSERT INTO achat (total, user_id) VALUES (:total, :user)";
          $query = $this->db->getConn()->prepare($sql);
          $query->bindValue(':total', $this->getTotal($data), \PDO::PARAM_INT);
          $query->bindValue(':user', $_SESSION['user']->id, \PDO::PARAM_INT);
          $query->execute();
          $lastAchat = $this->db->getConn()->lastInsertId();
          return [
               'store' => $this->insertDetails($data, $lastAchat),
               'id' => $lastAchat,
          ];
     }

     public function recentTotal ()
     {
          $sql = "SELECT total FROM achat WHERE id > 0 ORDER BY id DESC LIMIT 5";
          $result = $this->db->getConn()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
          $somme = 0;
          foreach($result as $argent) {
               $somme += $argent->total;
          }
          return $somme;
     }

     public function delete (int $id) 
     {
          $stmt = $this->db->getConn()->prepare("DELETE FROM achat WHERE id = :id");
          $stmt->bindValue(":id", $id);
          $_SESSION['danger'] = "Vente N°$id supprimé";
          return $stmt->execute();
     }
     
     public function deleteWithUser (int $id)
     {
          $stmt = $this->db->getConn()->prepare("DELETE FROM users WHERE user_id = :id");
          $stmt->bindValue(":id", $id);
          return $stmt->execute();
     }

}

?>