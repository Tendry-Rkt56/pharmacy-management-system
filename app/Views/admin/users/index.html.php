<?php
     function classe ($user)
     {
          return strtoupper($user->roles) == "ADMIN" ? 'ordonnance no-required' : 'ordonnance required';
     } 

     function roles ($user)
     {
          return strtoupper($user->roles) == "ADMIN" ? 'Administrateur' : 'Utilisateur';

     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Les medicaments</title>
     <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
     <link rel="stylesheet" href="/assets/styles/index.css">
     <link rel="stylesheet" href="/assets/styles/style.css">
     <script src="/assets/script/header.js" defer></script>
</head>
<body>

     <style>
          .randoms {
               width:100%;
               display: flex;
               align-items:center;
               justify-content:center;
          }

          .random {
               width:30px;height:30px;
               font-weight:bold;
               border-radius:50%;
               font-size:14px;
               text-align:center;
               color:white;
               opacity:0.8;
          }
     </style>

     <?php require_once 'components/header.php' ?>


     <div class="containers">
          <div class='container d-flex align-items-center justify-content-center flex-column'>

               <?php if (isset($_SESSION)): ?>
                    <?php foreach($_SESSION as $key => $value): ?>
                         <?php if ($key !== 'user' && $key !== 'token' && $key !== 'panier'):?>
                              <p class="d-flex align-items-center justify-content-center container alert alert-<?=$key?>"><?=$value?></p>
                              <?php unset($_SESSION[$key])?>
                         <?php endif?>
                    <?php endforeach?>
               <?php endif ?>
                         
               <div class="container flex-column d-flex align-items-center justify-content-between gap-4 mb-5">
                    <div class="container d-flex align-items-center justify-content-between flex-row">
                         <h2 class="align-self-start">Les <span style="border-bottom:2px solid blueViolet;">uti</span>lisateurs</h2>
                         <a href="/user/new" class="btn btn-secondary btn-sm">Nouveau</a>
                    </div>
                    <form action="" class="gap-2 align-self-start d-flex align-items-center justify-content-center flex-row">
                         <input id="limit" type="number" class="form-control" value="<?=$limit?>" name="limit">
                         <input type="text" class="form-control" name="search" placeholder="Rechercher..." value="<?=$data['search'] ?? ''?>">
                         <input value="Rechercher" type="submit" class="btn btn-sm btn-outline-primary">
                    </form>
               </div>
                                   
               <table class="container table table-striped table-hover table-bordered">
                    <thead style="text-align:center;">
                         <tr>
                              <th scope="col"></th>
                              <th scope="col">#</th>
                              <th scope="col">Nom</th>
                              <th scope="col">Prénom</th>
                              <th scope="col">Email</th>
                              <th scope="col">Rôle</th>
                              <th scope="col"></th>
                         </tr>
                    </thead>
                    <tbody style="text-align: center;">
                         <?php foreach($users as $user): ?>
                              <?php
                                   $vert = rand(0, 255);
                                   $rouge = rand(0, 255);
                                   $blue = rand(0, 255);
                                   $color = "rgb($rouge, $vert, $blue)";
                              ?>
                              <tr>
                                   <td style="text-align:center;">
                                        <?php if (isset($user->image) && $user->image != null): ?>
                                             <img src="/<?=$user->image?>" style="height:30px;width:30px;border-radius:50%" alt="">
                                        <?php else: ?>
                                             <div class="randoms">
                                                  <span class="random d-flex align-items-center justify-content-center" style="background:<?=$color?>;"><?=substr($user->nom, 0, 1)?></span>
                                             </div>
                                        <?php endif ?>
                                   </td>
                                   <td><?=$user->id?></td>
                                   <td><?=$user->nom?></td>
                                   <td><?=$user->prenom?></td>
                                   <td><?=$user->email?></td>
                                   <td>
                                        <?php if (strtoupper($user->roles) == "ADMIN"): ?>
                                             <span class="ordonnance no-required">Administrateur</span>
                                        <?php else: ?>
                                             <span class="ordonnance required">Utilisateur</span>
                                        <?php endif ?>
                                   </td>
                                   <td>
                                        <div class="d-flex">
                                             <a href="/user/edit/<?=$user->id?>" class="mx-1 btn btn-sm btn-primary">Modifier</a>
                                             <form action="/user/<?=$user->id?>" method="POST">
                                                  <input type="submit" class="btn btn-danger btn-sm" value="Supprimer">
                                             </form>
                                        </div>
                                   </td>
                              </tr>  
                         <?php endforeach ?>   
                    </tbody>
               </table>
                         
               <div class="container my-3 d-flex justify-content-between flex-row gap-1 align-items-center">
                    <div class="fw-bolder"><?=$countArticles?> / <?=$count?></div>
                    <div class="d-flex justify-content-center flex-row gap-1 align-items-center">
                         <?php for($i = 1; $i <= $maxPages; $i++): ?>
                              <?php 
                                   $query = isset($data['search']) ? 'search='.$data['search'] : '';
                                   $query .= isset($data['category']) ? '&category='.$data['category'] : '';     
                                   $query .= isset($data['limit']) ? '&limit='.$data['limit'] : '';     
                              ?>
                         <?php $class = $i == $page ? 'btn-primary' : 'btn-outline-primary' ?>
                              <a style="border-radius:50%;border:none" class="btn <?=$class?>" href="/user?page=<?=$i?><?="&".$query?>"><?=$i?></a>
                         <?php endfor ?>
                    </div>
               </div>

          </div>
     </div>

     <script src="/assets/script/input/input.js"></script>

</body>
</html>