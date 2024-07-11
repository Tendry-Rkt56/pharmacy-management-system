<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> Création d'utilisateur </title>
     <link rel="stylesheet" href="/assets/styles/registration.css">
     <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
</head>

<body>
     <div class="wrapper">
          <h2>Registration</h2>
          <form action="" method="POST" enctype="multipart/form-data">
               <div class="input-box">
                    <input name="nom" class="form-control" type="text" placeholder="Nom..." required>
               </div>
               <div class="input-box">
                    <input name="prenom" class="form-control" type="text" placeholder="Prénom...">
               </div>
               <div class="input-box">
                    <input name="email" class="form-control" type="email" placeholder="Email..." required>
               </div>
               <div class="input-box">
                    <select style="width:80%" name="roles" id="" class="form-control">
                         <option value="admin">Administrateur</option>
                         <option value="user">Utilisateur</option>
                    </select>
               </div>
               <div class="input-box">
                    <input name="password" type="password" placeholder="Password..." required>
               </div>
               <div class="input-box">
                    <input type="file" placeholder="Image" class="form-control" name="image">
               </div>
               <div class="input-box button">
                    <input type="Submit" value="Créer">
               </div>
          </form>
     </div>

</body>

</html>