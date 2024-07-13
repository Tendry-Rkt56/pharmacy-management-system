<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> Création d'utilisateur </title>
     <link rel="stylesheet" href="/assets/styles/registration.css">
     <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
     <link rel="stylesheet" href="/assets/styles/style.css">
     <script src="/assets/header.js" defer></script>
</head>

<body>
     <?php  require_once 'components/header.php' ?>
     <div class="registration">
          <div class="wrapper">
               <h2>Registration</h2>
               <?php if (isset($user->image)) : ?>
                    <img src="/<?= $user->image ?>" class="mt-2 mb-3" alt="" style="text-align:center;height:60px;width:60px;border-radius:50%;">
               <?php endif ?>
               <form action="" method="POST" enctype="multipart/form-data">
                    <div class="input-box">
                         <input name="nom" class="form-control" type="text" placeholder="Nom..." value="<?= $user->nom ?>" required>
                    </div>
                    <div class="input-box">
                         <input name="prenom" class="form-control" type="text" placeholder="Prénom..." value="<?= $user->prenom ?>">
                    </div>
                    <div class="input-box">
                         <input name="email" class="form-control" type="email" placeholder="Email..." value="<?= $user->email ?>" required>
                    </div>
                    <div class="input-box">
                         <input name="password" type="password" placeholder="new password..." required>
                    </div>
                    <div class="input-box">
                         <input type="file" placeholder="Image" class="form-control" name="image">
                    </div>
                    <div class="input-box button">
                         <input type="Submit" value="Modifier">
                    </div>
               </form>
          </div>
     </div>

</body>

</html>