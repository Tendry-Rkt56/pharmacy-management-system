<?php
	$uri = $_SERVER['REQUEST_URI'];
    $vert = rand(0, 255);
    $rouge = rand(0, 255);
    $blue = rand(0, 255);
    $color = "rgb($rouge, $vert, $blue)";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Card</title>
    <link rel="stylesheet" href="/assets/styles/profil.css">
    <link rel="stylesheet" href="/assets/styles/style.css">
    <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
    <script src="/assets/script/header.js" defer></script>
</head>

<body>
    <?php require_once 'components/users.php'?>
    <div class="container">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="d-flex align-items-center justify-content-center"><?=$_SESSION['success']?></div>
        <?php endif ?>
    </div>
    <div class="containers">
        <div class="profile-card">
            <div class="profile-content">
                <?php if (isset($users->image) && $users->image != null): ?>
                    <img src="/<?=$users->image?>" alt="" class="profile-pic">
                <?php else: ?>
                    <img src="/image/users/default.jpg" alt="" class="profile-pic" style="border:1px solid green">
                <?php endif ?>
                <h2><?=$users->nom?> <?=$users->prenom?></h2>
                <p><?=$users->adresse?></p>
                <p><?=strtoupper($users->roles) == "ADMIN" ? 'Administrateur' : 'Utilisateur'?></p>
                <div class="profile-stats">
                    <div>
                        <span>Téléphone</span>
                        <p>(+261) <?=$users->telephone?></p>
                    </div>
                    <div>
                        <span>Email</span>
                        <p><?=$users->email?></p>
                    </div>
                    <div>
                        <span>Facebook</span>
                        <p>Tendry RKT</p>
                    </div>
                </div>
                <?php if ($users->id == $id): ?>
                    <a href="/users/profil/edit" class="show-more">Editer</a>
                <?php endif ?>
            </div>
        </div>
    </div>
</body>

</html>