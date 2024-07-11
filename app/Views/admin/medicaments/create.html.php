<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Création</title>
     <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
     <link rel="stylesheet" href="/assets/styles/index.css">
</head>
<body>

     <?php require_once 'components/header.php' ?>


     <div class="container">
          <form enctype="multipart/form-data" class="gap-2 forms-create container d-flex align-items-center justify-content-center flex-column" action="" method="POST">
               <h3 class="mb-5" ><span>Cré</span>ation</h3>
               <div class="d-flex align-items-center justify-content-center container-fluid">
                    <label style="width:30%" for="" class="fw-bolder">Nom: </label>
                    <input required style="width:70%" type="text" class="form-control" placeholder="Nom..." name="nom">
               </div>
               <div class="d-flex align-items-center justify-content-center container-fluid my-2">
                    <label style="width:30%" for="" class="fw-bolder">Prix: </label>
                    <input style="width:70%" type="number" class="form-control" placeholder="Prix..." name="prix">
               </div>
               <div class="d-flex align-items-center justify-content-center container-fluid">
                    <input style="width:70%" type="hidden" name="token" value="<?=$token?>">
               </div>
               <div class="d-flex align-items-center align-self-start justify-content-center container-fluid">
                    <label style="width:100%" for="" class="fw-bolder">Ordonnance non requise: </label>
                    <input type="radio" name="ordonnance" value="0" class="form-check-input" checked>
               </div>
               <div class="d-flex align-items-center justify-content-center container-fluid">
                    <label style="width:100%" for="" class="fw-bolder">Ordonnance requise: </label>
                    <input type="radio" name="ordonnance" value="1" class="form-check-input">               
               </div>
               <div class="d-flex align-items-center justify-content-center container-fluid my-2">
                    <label style="width:30%" for="" class="fw-bolder">Catégorie associée: </label>
                    <select style="width:70%" name="category" id="" class="form-select">
                         <option value="" disabled>Séléctionner la catégorie associée</option>
                         <?php foreach($categories as $category): ?>
                              <option value="<?=$category->id?>"><?=$category->nom?></option>
                         <?php endforeach?>
                    </select>
               </div>
               <input type="submit" class="btn btn-primary mt-5" value="Créer">
          </form>
     </div>
</body>
</html>