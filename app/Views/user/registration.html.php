<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> Création d'utilisateur </title>
     <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
     <link rel="stylesheet" href="/assets/styles/style.css">
     <link rel="stylesheet" href="/assets/styles/registration.css">
     <script src="/assets/script/header.js" defer></script>
</head>

<body>
     <?php require_once 'components/header.php' ?>
     <div class="registration container">
          <div class="wrapper">
               <h2>Registration</h2>
               <form action="" method="POST" id="form" enctype="multipart/form-data">
                    <div class="container-fluid row">
                         <div class="col-6 input-box">
                              <input name="nom" class="form-control" type="text" placeholder="Nom..." required>
                         </div>
                         <div class="col-6 input-box">
                              <input name="prenom" class="form-control" type="text" placeholder="Prénom...">
                         </div>
                    </div>
                    <div class="row container-fluid">
                         <div class="col-6 input-box">
                              <input name="email" class="form-control" type="email" placeholder="Email..." required>
                         </div>
                         <div class="col-6 input-box">
                              <select style="width:80%" name="roles" id="" class="form-control">
                                   <option value="admin">Administrateur</option>
                                   <option value="user">Utilisateur</option>
                              </select>
                         </div>
                    </div>
                    <div class="container-fluid row">
                         <div class="col-6 input-box">
                              <input name="telephone" type="text" placeholder="Téléphone..." required>
                         </div>
                         <div class="col-6 input-box">
                              <input type="text" name="adresse" placeholder="Adresse...">
                         </div>
                    </div>
                    <div class="row container-fluid">
                         <div class="col-6 input-box">
                              <input name="password" type="password" placeholder="Password..." required>
                         </div>
                         <div class="col-6 input-box">
                              <input type="file" placeholder="Image" class="form-control" name="image">
                         </div>
                    </div>
                    <div class="input-box button">
                         <input type="Submit" value="Créer">
                    </div>
               </form>
          </div>
     </div>

</body>

</html>