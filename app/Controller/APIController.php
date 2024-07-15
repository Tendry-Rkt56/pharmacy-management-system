<?php 

namespace App\Controller;

class APIController extends Controller
{

     public function medicament (array $data = [])
     {
          $value = $data['value'];
          $medicaments = $this->app->getModel('API')->getMedicament($value);
          header('Content-Type: application/json');
          echo json_encode($medicaments);
     }

}

?>