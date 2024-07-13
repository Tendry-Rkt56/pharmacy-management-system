<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Les catégories</title>
     <link rel="stylesheet" href="/assets/styles/index.css">
     <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
     <link rel="stylesheet" href="/assets/styles/style.css">
     <script src="/assets/script/header.js" defer></script>
</head>
<body>

     <?php require_once 'components/users.php' ?>

     <div class='containers'>

          <?php if (isset($_SESSION)): ?>
               <?php foreach($_SESSION as $key => $value): ?>
                    <?php if ($key !== 'user' && $key !== 'token' && $key !== 'panier'):?>
                         <p class="d-flex align-items-center justify-content-center container alert alert-<?=$key?>"><?=$value?></p>
                         <?php unset($_SESSION[$key])?>
                    <?php endif?>
               <?php endforeach?>
          <?php endif ?>

          <div style="width:90%" class="container d-flex align-items-center justify-content-between gap-1 my-4">
               <h2 style="letter-spacing:2px">Les <span style="border-bottom:2px solid rgb(9, 181, 9)">cat</span>égories</h2>
          </div>

          <table style="width:90%" class="container table table-striped">
               <thead>
                    <tr>
                         <th>N°</th>
                         <th style="width:500px;">Nom</th>
                    </tr>
               </thead>
               <tbody>
                    <?php foreach($categories as $category): ?>
                         <tr>
                              <td><?=$category->id?></td>
                              <td><?=$category->nom?></td>
                         </tr>  
                    <?php endforeach ?>   
               </tbody>
          </table>

          <div class="my-5 d-flex align-items-center justify-content-center flex-row gap-2">
               <?php for($i = 1; $i <= $maxPages; $i++): ?>
                    <?php $class = $i == $page ? 'btn-primary' : 'btn-outline-primary' ?>
                    <a class="btn <?=$class?>" href="/users/categories?page=<?=$i?>"><?=$i?></a>
               <?php endfor ?>
          </div>

     </div>

</body>
</html>