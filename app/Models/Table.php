<?php

namespace App\Models;

use Config\DataBase;

class Table 
{

     public function __construct (protected DataBase $db)
     {
     }

}

?>