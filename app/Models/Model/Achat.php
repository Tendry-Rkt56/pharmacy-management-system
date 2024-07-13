<?php

namespace App\Models\Model;

use App\Models\Table;

class Achat extends Table
{

     public function all (int $limit, int $offset): mixed
     {
          $query = "SELECT * FROM achat";  
          $query .= " LIMIT $limit OFFSET $offset";
          $query = $this->db->getConn()->query($query);
          return $query->fetchAll(\PDO::FETCH_OBJ);
     }

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

}

?>