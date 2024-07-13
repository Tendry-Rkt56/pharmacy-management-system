<?php require_once 'components/date.php' ?>
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
                         <h2 class="align-self-start" style="letter-spacing:2px">Les <span style="border-bottom:2px solid rgb(9,181, 9);">Ac</span>hats</h2>
                         <a href="/medicament/new" class="btn btn-secondary btn-sm">Nouveau</a>
                    </div>
               </div>
                                   
               <table class="container table table-striped table-hover table-bordered">
                    <thead style="text-align:center;">
                         <tr>
                              <th scope="col">#</th>
                              <th scope="col">Total</th>
                              <th scope="col">Date</th>
                              <th scope="col"></th>
                         </tr>
                    </thead>
                    <tbody style="text-align: center;">
                         <?php foreach($achats as $achat): ?>
                              <tr>
                                   <td><?=$achat->id?></td>
                                   <td class="fw-bold"><?=number_format($achat->total, thousands_separator: ' ')?> Ar</td>
                                   <?php 
                                        $dateTime = new DateTime($achat->createdAt);
                                        $formattedDate = $dateTime->format('j F Y');
                                        $formattedDate = strtr($formattedDate, $months);  
                                   ?>
                                   <td style="text-align:center;"><?=$formattedDate?></td>
                                   <td>
                                        <div class="d-flex">
                                             <a href="/users/details/<?=$achat->id?>" class="mx-1 btn btn-primary">Détails</a>
                                             <form method="" action="/achat/delete/<?=$achat->id?>">
                                                  <input type="submit" class="btn btn-danger" value="Supprimer">
                                             </form>
                                        </div>
                                   </td>
                              </tr>  
                         <?php endforeach ?>   
                    </tbody>
               </table>
                         
               <div class="container my-3 d-flex justify-content-between flex-row gap-1 align-items-center">
                    <div class="fw-bolder"><?=$countAchats?> / <?=$count?></div>
                    <div class="d-flex justify-content-center flex-row gap-1 align-items-center">
                         <?php for($i = 1; $i <= $maxPages; $i++): ?>
                              <?php $class = $i == $page ? 'btn-primary' : 'btn-outline-primary' ?>
                              <a style="border-radius:50%;border:none" class="btn <?=$class?>" href="/achat?page=<?=$i?>"><?=$i?></a>
                         <?php endfor ?>
                    </div>
               </div>

          </div>
     </div>

     <script src="/assets/script/input/input.js"></script>

</body>
</html>