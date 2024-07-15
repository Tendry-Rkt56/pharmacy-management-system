<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Création catégorie</title>
     <link rel="stylesheet" href="/assets/styles/index.css">
     <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
     <link rel="stylesheet" href="/assets/styles/style.css">
     <script src="/assets/script/header.js" defer></script>
</head>
<body>

     <?php require_once 'components/header.php' ?>

     <div class="container">
          <form enctype="multipart/form-data" class="forms-update d-flex align-items-center justify-content-center flex-column" action="" method="POST">
               <h3 class="mb-5" ><span>Cré</span>ation</h3>
               <div class="d-flex align-items-center justify-content-center container-fluid">
                    <label style="width:30%" for="" class="fw-bolder">Nom: </label>
                    <input style="width:70%" type="text" class="form-control" placeholder="Nom..." name="nom">
               </div>
               <div class="d-flex align-items-center justify-content-center container-fluid">
                    <input style="width:70%" type="hidden" name="token" value="<?=$token?>">
               </div>
               <input type="submit" class="btn btn-primary mt-5" value="Créer">
          </form>
     </div>
</body>
</html>