<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Les medicaments</title>
     <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
     <link rel="stylesheet" href="/assets/styles/index.css">
</head>
<body>

     <?php require_once '../app/Views/components/header.php' ?>


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
                         <h2 class="align-self-start">Les <span style="border-bottom:2px solid blueViolet;">méd</span>icaments</h2>
                         <a href="/medicament/new" class="btn btn-secondary btn-sm">Nouveau</a>
                    </div>
                    <form action="" class="gap-2 align-self-start d-flex align-items-center justify-content-center flex-row">
                         <input type="number" class="form-control" value="<?=$limit?>" name="limit">
                         <input type="text" class="form-control" name="search" placeholder="Rechercher..." value="<?=$data['search'] ?? ''?>">
                         <select name="category" class="form-select" id="">
                              <option <?php if (isset($data['category']) && $data['category'] == 1000): ?> selected <?php endif ?> value="1000">Tous</option>
                              <?php foreach($categories as $category): ?>
                                   <option <?php if (isset($data['category']) && $data['category'] == $category->id): ?> selected <?php endif ?> value="<?=$category->id?>"><?=$category->nom?></option>
                              <?php endforeach ?>
                         </select>
                         <input value="Rechercher" type="submit" class="btn btn-sm btn-outline-primary">
                    </form>
               </div>
                                   
               <table class="container table table-striped table-hover table-bordered">
                    <thead style="text-align:center;">
                         <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nom</th>
                              <th scope="col">Prix</th>
                              <th scope="col">Ordonnance</th>
                              <th scope="col">Catégorie associée</th>
                              <th scope="col"></th>
                         </tr>
                    </thead>
                    <tbody style="text-align: center;">
                         <?php foreach($medicaments as $medicament): ?>
                              <tr>
                                   <td><?=$medicament->id?></td>
                                   <td><?=$medicament->nom?></td>
                                   <td class="fw-bold"><?=number_format($medicament->prix, thousands_separator: ' ')?> Ar</td>
                                   <td>
                                        <?php if ($medicament->ordonnance == 1): ?>
                                             <span class="ordonnance required">Requise</span>
                                        <?php else: ?>
                                             <span class="ordonnance no-required">Sans ordonnance</span>
                                        <?php endif ?>
                                   </td>
                                   <td style="text-align:center;"><?=$medicament->category ?? '----'?></td>
                                   <td>
                                        <div class="d-flex">
                                             <a href="/medicament/edit/<?=$medicament->id?>" class="mx-1 btn btn-sm btn-primary">Modifier</a>
                                             <form action="/medicament/<?=$medicament->id?>" method="POST">
                                                  <input type="hidden" value="<?=$token?>" name="token">
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
                              <a style="border-radius:50%;border:none" class="btn <?=$class?>" href="/medicament?page=<?=$i?><?="&".$query?>"><?=$i?></a>
                         <?php endfor ?>
                    </div>
               </div>

          </div>
     </div>

</body>
</html>