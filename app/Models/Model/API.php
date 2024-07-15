<?php

namespace App\Models\Model;


use App\Models\Table;

class API extends Table
{

     public function getMedicament (string $value)
     {
          $sql = "SELECT * FROM medicament WHERE nom LIKE '%$value%' AND nombre > 0";
          return $this->db->getConn()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
     }

}