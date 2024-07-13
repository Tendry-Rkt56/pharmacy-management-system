<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Edition</title>
     <link rel="stylesheet" href="/assets/styles/index.css">
     <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
     <link rel="stylesheet" href="/assets/styles/style.css">
     <script src="/assets/script/header.js" defer></script>
</head>
<body>

     <?php require_once 'components/header.php' ?>
 

     <div class="container">
          <form enctype="multipart/form-data" class="gap-2 forms-create d-flex align-items-center justify-content-center flex-column" action="" method="POST">
               <h3 class="mb-4" ><?=$medicament->nomMed?></h3>
               <div class="d-flex align-items-center justify-content-center container">
                    <label style="width:30%" for="" class="fw-bolder">Nom: </label>
                    <input style="width:70%" type="text" class="form-control" placeholder="Nom..." name="nom" value="<?=$medicament->nomMed?>">
               </div>
               <div class="d-flex align-items-center justify-content-center container-fluid my-2">
                    <label style="width:30%" for="" class="fw-bolder">Prix: </label>
                    <input style="width:70%" type="number" class="form-control" placeholder="Prix..." name="prix" value="<?=$medicament->prix?>">
               </div>
               <div class="d-flex align-items-center align-self-start justify-content-center container-fluid">
                    <label style="width:100%" for="" class="fw-bolder">Ordonnance non requise: </label>
                    <input type="radio" name="ordonnance" value="0" class="form-check-input" <?php if ($medicament->ordonnance == 0): ?> checked <?php endif?>>
               </div>
               <div class="d-flex align-items-center justify-content-center container-fluid">
                    <label style="width:100%" for="" class="fw-bolder">Ordonnance requise: </label>
                    <input type="radio" name="ordonnance" value="1" class="form-check-input" <?php if ($medicament->ordonnance == 1): ?> checked <?php endif?>>               
               </div>
               <div class="d-flex align-items-center justify-content-center container-fluid my-2">
                    <label style="width:30%" for="" class="fw-bolder">Catégorie associée: </label>
                    <select style="width:70%" name="category" id="" class="form-select">
                         <option value="" disabled>Séléctionner la catégorie associée</option>
                         <?php foreach($categories as $category): ?>
                              <option <?php if ($category->id == $medicament->categoryId): ?>selected<?php endif ?> value="<?=$category->id?>"><?=$category->nom?></option>
                         <?php endforeach?>
                    </select>
               </div>
               <div class="d-flex align-items-center justify-content-center container-fluid my-2">
                    <input style="width:70%" type="hidden" name="token" value="<?=$token?>">
               </div>
               <input type="submit" class="btn btn-primary mt-5" value="Modifier">
          </form>
     </div>
</body>
</html>

